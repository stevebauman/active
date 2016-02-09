# Active
An active HTML class helper that echo's strings based on the current route

[![Build Status](https://img.shields.io/travis/stevebauman/active.svg?style=flat-square)](https://travis-ci.org/stevebauman/active)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/stevebauman/active/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevebauman/active/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/stevebauman/active.svg?style=flat-square)](https://packagist.org/packages/stevebauman/active)
[![Latest Stable Version](https://img.shields.io/packagist/v/stevebauman/active.svg?style=flat-square)](https://packagist.org/packages/stevebauman/active)
[![License](https://img.shields.io/packagist/l/stevebauman/active.svg?style=flat-square)](https://packagist.org/stevebauman/active)

## Installation

Insert active inside your `composer.json`:

```json
"stevebauman/active": "1.0.*"
```

Insert the service provider in `config/app.php` **only if you need the configuration file**.

```php
\Stevebauman\Active\ActiveServiceProvider::class,
```

Run `composer update`, and you're all set!

## Usage

This documentation will use the `active()` helper, however you can replace it with `(new Stevebauman\Active\Active())`
if you'd prefer not to use the helper.

The default output class is `active`, which is the standard bootstrap class for displaying buttons and links in a different
color if they match the current URL. 

Output on active routes or route:

```html
<!-- `active` will be displayed when you visit `products/index` -->
<a
    class="btn btn-success {{ active()->route('products.index') }}"
    href="{{ route('products.index') }}">
        Products
</a>
```

```html
<!-- `active` will be displayed when you visit `products/index` or `products/create` -->
<a
    class="btn btn-success {{ active()->route(['products.index', 'products.create']) }}"
    href="{{ route('products.index') }}">
        Products
</a>
```

To output active on any routes below a certain route, use the wildcard (`*`) inside your route.

For example:

```html
<!-- `active` will be displayed when you visit any route below `products.` -->
<a
    class="btn btn-success {{ active()->route('products.*') }}"
    href="{{ route('products.index') }}">
        Products
</a>
```

```html
<!-- `active` will be displayed when you visit any route below `products.`, or `suppliers.` -->
<a
    class="btn btn-success {{ active()->route(['products.*', 'suppliers.*']) }}"
    href="{{ route('products.index') }}">
        Products
</a>
```
