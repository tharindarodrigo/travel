# Breadcrumb

[![Build Status](https://travis-ci.org/foxted/Breadcrumb.svg?branch=master)](https://travis-ci.org/foxted/Breadcrumb)
[![Latest Stable Version](https://poser.pugx.org/foxted/breadcrumb/v/stable.svg)](https://packagist.org/packages/foxted/breadcrumb)
[![Monthly Downloads](https://poser.pugx.org/foxted/breadcrumb/d/monthly.png)](https://packagist.org/packages/foxted/breadcrumb)
[![Latest Unstable Version](https://poser.pugx.org/foxted/breadcrumb/v/unstable.svg)](https://packagist.org/packages/foxted/breadcrumb)
[![License](https://poser.pugx.org/foxted/breadcrumb/license.svg)](https://packagist.org/packages/foxted/breadcrumb)

Small package to quickly generate Bootstrap 3 breadcrumbs in your Laravel app.

## Installation

First, pull in the package through Composer.

```js
"require": {
    "foxted/breadcrumb": "~1.0"
}
```

Then include the service provider within `app/config/app.php`.

```php
'providers' => [
    'Foxted\Breadcrumb\BreadcrumbServiceProvider'
];
```

Add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Breadcrumb' => 'Foxted\Breadcrumb\Facades\Breadcrumb'
];
```

And finally publish the view:

```
php artisan view:publish foxted/breadcrumb
```

## Usage

Within your controllers, before rendering your view, generate your breadcrumbs links:

```php
public function index()
{
    Breadcrumb::add('Home', route('home')); // Generate a link node
    Breadcrumb::add('Second page'); // Generate a static node
    Breadcrumb::add('Third page', route('third-page'), 1);
    Breadcrumb::add('Third page', NULL, 1); // Generate an active node (without Link)
    return View::make('index');
}
```

To show your breadcrumb in your view, just use the following Blade directive:

```
@breadcrumb
```

## Contribution

Any ideas are welcome. Feel free the submit any issues or pull requests.

Enjoy ;)
