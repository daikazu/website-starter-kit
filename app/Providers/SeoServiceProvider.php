<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use romanzipp\Seo\Builders\StructBuilder;
use romanzipp\Seo\Facades\Seo;
use romanzipp\Seo\Services\SeoService;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Title;

class SeoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        StructBuilder::$indent = str_repeat(' ', 4);

        // Add a getTitle method for obtaining the unmodified title

        Seo::macro('getTitle', function () {
            /** @var SeoService $this */
            if (! $title = $this->getStruct(Title::class)) {
                return null;
            }

            if (! $body = $title->getBody()) {
                return null;
            }

            return $body->getOriginalData();
        });

        Seo::macro('customTag', fn (string $value) => /** @var SeoService $this */
            $this->add(
                Meta::make()->name('custom')->content($value)
            ));

        Blade::directive('seoTitle', fn ($expression): string => "<?php seo()->title({$expression}); ?>");
        Blade::directive('seoDescription', fn ($expression): string => "<?php seo()->description({$expression}); ?>");
        Blade::directive('seoRobots', fn ($expression): string => "<?php  seo()->meta('robots', {$expression}) ?>");
        Blade::directive('seoCanonical', fn ($expression): string => "<?php  seo()->canonical({$expression}); ?>");
        Blade::directive('seoImage', fn ($expression): string => "<?php  seo()->image({$expression}); ?>");
    }
}
