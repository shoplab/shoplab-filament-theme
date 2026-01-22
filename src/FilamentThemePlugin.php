<?php

namespace Shoplab\FilamentTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class FilamentThemePlugin implements Plugin
{
    public static function make(): static
    {
        return new static;
    }

    public function getId(): string
    {
        return 'shoplab-filament-theme';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Css::make('shoplab-filament-theme', __DIR__.'/../dist/index.css'),
        ], 'shoplab/shoplab-filament-theme');
    }

    public function boot(Panel $panel): void
    {
        // Additional boot logic if needed
    }
}
