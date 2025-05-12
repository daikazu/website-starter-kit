<?php

use App\View\Components\PriceTable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

afterEach(function (): void {
    // Clean up any created JSON files after each test
    $testFiles = [
        storage_path('price_data_test.json'),
        storage_path('stale-pricing.json'),
        storage_path('missing-pricing.json'),
        storage_path('test-pricing.json'),
    ];

    //     Iterate over and delete only existing files
    foreach ($testFiles as $file) {
        if (File::exists($file)) {
            File::delete($file);
        }
    }
});

it('renders the PriceTable component correctly', function (): void {
    // Arrange
    $filename = 'test-pricing.json';
    $caption = 'Test Caption';
    $addDollarSign = true;

    $mockData = (object) [
        'caption'         => 'Mock Caption',
        'footnotes'       => ['Mock Footnote'],
        'arbitrary'       => true,
        'pricable'        => ['price'],
        'priceMultiplier' => 1.5,
        'rows'            => [
            ['category' => 'Mock Category', 'price' => 20],
            ['category' => 'Another Category', 'price' => 30],
        ],
    ];

    // Mock external dependencies
    Cache::shouldReceive('flexible')
        ->once()
        ->andReturn($mockData);

    file_put_contents(storage_path('price_data_test.json'), $mockData);

    // Act
    $component = new PriceTable($filename, $caption, $addDollarSign);

    // Assert component properties
    expect($component->caption)->toBe($caption)
        ->and($component->footnotes)->toBe($mockData->footnotes); // Constructor should prefer passed in value
});

it('loads data from the cache and sets default properties', function (): void {
    // Arrange: Mock external dependencies
    $filename = 'test-pricing.json';
    $mockData = (object) [
        'caption'         => 'Mock Caption',
        'footnotes'       => ['Mock Footnote 1', 'Mock Footnote 2'],
        'arbitrary'       => true,
        'pricable'        => ['price'],
        'priceMultiplier' => 1.5,
        'rows'            => [
            ['category' => 'Mock Category 1', 'price' => 20],
            ['category' => 'Mock Category 2', 'price' => 30],
        ],
    ];

    // Flexible cache mock
    Cache::shouldReceive('flexible')->once()
        ->andReturn($mockData);

    // Act: Create the PriceTable instance
    $component = new PriceTable($filename, 'Test Caption', true);

    // Assert: Validate properties are set correctly
    expect($component->caption)->toBe('Test Caption')
        ->and($component->footnotes)->toBe($mockData->footnotes)
        ->and($component->arbitrary)->toBeTrue()
        ->and($component->pricable)->toBe($mockData->pricable)
        ->and($component->priceMultiplier)->toBe($mockData->priceMultiplier)
        ->and($component->rows)->toBeInstanceOf(Collection::class)
        ->and($component->rows->toArray())->toBe($mockData->rows)
        ->and($component->addDollarSign)->toBeTrue(); // As it was passed as a constructor argument
});

it('renders the correct view name', function (): void {
    // Act
    $component = new PriceTable('test-pricing.json');
    $view = $component->render();

    // Assert
    expect($view)->toBe('components.price-table');
})->todo();

it('falls back to stale cache data if fetching new data fails', function (): void {
    // Arrange
    $filename = 'stale-pricing.json';
    $cacheKey = 'price_data_stale_pricing';
    $staleData = (object) [
        'caption'   => 'Stale Caption',
        'footnotes' => ['Stale Footnote'],
        'rows'      => [['category' => 'Stale Category', 'price' => 10]],
    ];

    Cache::shouldReceive('flexible')->andThrow(new Exception('Failed to fetch data.'));
    Cache::shouldReceive('get')->with($cacheKey . '_stale')->once()->andReturn($staleData);
    Log::shouldReceive('error')->once();

    // Act
    $component = new PriceTable($filename);

    // Assert
    expect($component->caption)->toBe('Stale Caption')
        ->and($component->footnotes)->toBe($staleData->footnotes)
        ->and($component->rows->toArray())->toBe($staleData->rows);
})->todo();

it('handles an empty fallback if no stale cache is available', function (): void {
    // Arrange
    $filename = 'missing-pricing.json';
    $cacheKey = 'price_data_missing_pricing';

    Cache::shouldReceive('flexible')->andThrow(new Exception('Failed to fetch data.'));
    Cache::shouldReceive('get')->with($cacheKey . '_stale')->once()->andReturn(null);
    Log::shouldReceive('error')->once();

    // Act
    $component = new PriceTable($filename);

    // Assert
    expect($component->caption)->toBeNull()
        ->and($component->footnotes)->toBe([])
        ->and($component->rows->toArray())->toBe([]);
})->throws(new Exception('Failed to fetch data.'))->todo();
