<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\artisan;

beforeEach(function (): void {
    Storage::fake('local');
    Config::set('app.url', 'https://example.com');
});

test('it generates sitemap files', function (): void {
    artisan('app:generate-sitemap')
        ->assertSuccessful()
        ->expectsOutput('Sitemap index and sitemaps generated successfully.');

    // Verify all expected files are generated
    Storage::disk('local')->assertExists('sitemap.xml');
    Storage::disk('local')->assertExists('sitemap_pages.xml');
    Storage::disk('local')->assertExists('sitemap_blog.xml');
    Storage::disk('local')->assertExists('sitemap_images.xml');
});

test('it generates valid XML files', function (): void {
    artisan('app:generate-sitemap')->assertSuccessful();

    $files = ['sitemap.xml', 'sitemap_pages.xml', 'sitemap_blog.xml', 'sitemap_images.xml'];

    foreach ($files as $file) {
        $content = Storage::disk('local')->get($file);
        expect(function () use ($content): void {
            new SimpleXMLElement($content);
        })->not->toThrow(Exception::class);
    }
});

test('sitemap index contains category sitemaps', function (): void {
    artisan('app:generate-sitemap')->assertSuccessful();

    $content = Storage::disk('local')->get('sitemap.xml');
    $xml = new SimpleXMLElement($content);

    expect($xml->getName())->toBe('sitemapindex')
        ->and($content)->toContain('sitemap_pages.xml')
        ->and($content)->toContain('sitemap_blog.xml')
        ->and($content)->toContain('sitemap_images.xml');
});

test('it handles invalid app URL gracefully', function (): void {
    Config::set('app.url', 'invalid-url');

    artisan('app:generate-sitemap')
        ->assertFailed()
        ->expectsOutput('Failed to generate sitemap: ');
})->todo();

test('it respects images flag', function (): void {
    // Test with images flag
    artisan('app:generate-sitemap', ['--images' => true])
        ->assertSuccessful();

    $content = Storage::disk('local')->get('sitemap_images.xml');
    $xml = new SimpleXMLElement($content);
    expect($xml->getName())->toBe('urlset');
});

test('generated sitemaps have correct XML structure', function (): void {
    artisan('app:generate-sitemap')->assertSuccessful();

    // Test sitemap index structure
    $indexContent = Storage::disk('local')->get('sitemap.xml');
    $indexXml = new SimpleXMLElement($indexContent);
    expect($indexXml->getName())->toBe('sitemapindex')
        ->and($indexXml->sitemap)->toBeInstanceOf(SimpleXMLElement::class);

    // Test category sitemap structure
    $pagesContent = Storage::disk('local')->get('sitemap_pages.xml');
    $pagesXml = new SimpleXMLElement($pagesContent);
    expect($pagesXml->getName())->toBe('urlset')
        ->and($pagesXml->getNamespaces())->toHaveKey('');
});

test('it uses correct app URL in sitemaps', function (): void {
    $testUrl = 'http://test-domain.com';
    Config::set('app.url', $testUrl);

    artisan('app:generate-sitemap')->assertSuccessful();

    $indexContent = Storage::disk('local')->get('sitemap.xml');
    expect($indexContent)->toContain($testUrl);
});

test('sitemaps include correct timestamps', function (): void {
    artisan('app:generate-sitemap')->assertSuccessful();

    $files = ['sitemap_pages.xml', 'sitemap_blog.xml', 'sitemap_images.xml'];

    foreach ($files as $file) {
        $content = Storage::disk('local')->get($file);
        $xml = new SimpleXMLElement($content);

        if (property_exists($xml, 'url') && $xml->url !== null) {
            foreach ($xml->url as $url) {
                // Verify lastmod format is correct (ISO 8601)
                if (property_exists($url, 'lastmod') && $url->lastmod !== null) {
                    expect(strtotime((string) $url->lastmod))->toBeGreaterThan(0);
                }
            }
        }
    }
});

test('it creates storage directory if it does not exist', function (): void {
    // Remove storage directory if it exists
    if (Storage::disk('local')->exists('')) {
        Storage::disk('local')->deleteDirectory('');
    }

    artisan('app:generate-sitemap')->assertSuccessful();

    expect(Storage::disk('local')->exists('sitemap.xml'))->toBeTrue();
});
