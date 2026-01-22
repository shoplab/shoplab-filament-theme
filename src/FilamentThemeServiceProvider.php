<?php

namespace Shoplab\FilamentTheme;

use Illuminate\Support\ServiceProvider;

class FilamentThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FilamentThemePlugin::class, fn () => new FilamentThemePlugin);
    }

    public function boot(): void
    {
        //
    }
}
