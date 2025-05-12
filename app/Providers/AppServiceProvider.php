<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Stringable;
use Livewire\Livewire;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        Livewire::forceAssetInjection();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(! $this->app->isProduction());

        Blade::directive('ifsectionempty', fn ($expression): string => "<?php if (is_blade_section_empty({$expression})): ?>");

        Blade::directive('endifsectionempty', fn (): string => '<?php endif; ?>');

        Stringable::macro('removeTrailingDoubleSlash', function (): \Illuminate\Support\Stringable {
            /** @var Stringable $this */
            $string = $this->toString();

            // Remove trailing double slashes
            $string = preg_replace('#/+$#', '/', $string);

            return new Stringable($string);
        });

    }
}
