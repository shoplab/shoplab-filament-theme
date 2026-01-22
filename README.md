# Shoplab Filament Theme

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shoplab/shoplab-filament-theme.svg?style=flat-square)](https://packagist.org/packages/shoplab/shoplab-filament-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/shoplab/shoplab-filament-theme/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/shoplab/shoplab-filament-theme/actions?query=workflow%3Atests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/shoplab/shoplab-filament-theme.svg?style=flat-square)](https://packagist.org/packages/shoplab/shoplab-filament-theme)

A custom Linear-inspired theme for Filament v5 panels. This theme provides a modern, clean interface with refined typography, spacing, and color palettes optimized for multi-tenant applications.

## Features

- Linear-inspired design with modern aesthetics
- Optimized for both light and dark modes
- Custom CSS tokens for consistent design system
- Built with Tailwind CSS 4
- Zero JavaScript - pure CSS theming
- Automatic service provider registration

## Requirements

- PHP 8.2 or higher
- Laravel 11 or higher
- Filament 5.0 or higher

## Installation

Install the package via Composer:

```bash
composer require shoplab/shoplab-filament-theme
```

The service provider will be automatically registered.

## Usage

There are two ways to use this theme with your Filament panels:

### Option 1: Using viteTheme() (Recommended for Development)

This approach compiles the theme CSS from source using Vite, allowing for hot-reload during development:

**1. Add the theme CSS to your Vite configuration:**

```javascript
// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'vendor/shoplab/shoplab-filament-theme/src/Resources/css/theme.css',
            ],
            refresh: true,
        }),
    ],
});
```

**2. Use viteTheme() in your panel provider:**

```php
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->viteTheme('vendor/shoplab/shoplab-filament-theme/src/Resources/css/theme.css')
        // ... other configuration
}
```

### Option 2: Using the Plugin (Pre-compiled CSS)

Use the plugin if you prefer pre-compiled CSS without involving Vite:

```php
use Shoplab\FilamentTheme\FilamentThemePlugin;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(FilamentThemePlugin::make())
        // ... other configuration
}
```

## Local Development

For local theme development, you can use Composer's path repository feature:

**1. Add to your project's `composer.json`:**

```json
{
    "repositories": {
        "shoplab-theme": {
            "type": "path",
            "url": "packages/shoplab/shoplab-filament-theme"
        }
    },
    "require": {
        "shoplab/shoplab-filament-theme": "@dev"
    }
}
```

**2. Install the local package:**

```bash
composer require shoplab/shoplab-filament-theme:@dev
```

This creates a symlink to your local package, enabling instant feedback when editing theme files.

**3. Build the theme CSS:**

```bash
cd packages/shoplab/shoplab-filament-theme
npm install
npm run build
```

Or use watch mode for automatic rebuilds:

```bash
npm run dev
```

## Customization

To customize the theme, you can:

1. Fork this package
2. Modify `src/Resources/css/theme.css` and `src/Resources/css/tokens.css`
3. Rebuild with `npm run build`
4. Publish your own version to Packagist

### CSS Structure

- `src/Resources/css/theme.css` - Main theme styles and component overrides
- `src/Resources/css/tokens.css` - Design tokens (colors, spacing, typography)

## Testing

Run tests with Pest:

```bash
composer test
```

Check code style with Pint:

```bash
composer pint
```

Build CSS assets:

```bash
npm run build
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

### Development Setup

1. Clone the repository
2. Install dependencies: `composer install && npm install`
3. Make your changes
4. Run tests: `composer test`
5. Check code style: `composer pint`
6. Submit a PR

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for recent changes.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
