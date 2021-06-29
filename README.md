# Laratoast  <!-- omit in toc -->

Integrate livewire with sweetalert.

- [Installation](#installation)
- [How to use](#how-to-use)
- [Sweetalert](#sweetalert)
- [Toast](#toast)
- [Available configuration](#available-configuration)

## [Installation](https://packagist.org/packages/simtabi/laratoast)

`composer require simtabi/laratoast`

## How to use

### 1. Add `LaratoastServiceProvider` in `config/app.php` <!-- omit in toc -->

```php
    ...
    Simtabi\Laratoast\LaratoastServiceProvider::class
    ...
```

### 2. Include javascript <!-- omit in toc -->

```blade
    ...
    // place this directive in the header
    @laratoastUIStyles

    // no need to call this, as it has already been called when you call @laratoastLoadUIScripts
    @laratoastUIScripts

    // no need to include this as it has already been loaded in init file
    @laratoastLoadUIScripts
    ...
```

### 3. Extra config file <!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=laratoast-assets`.
Publish the configs: `php artisan vendor:publish --tag=laratoast-config`.
Publish the configs: `php artisan vendor:publish --tag=laratoast-views`.
> See [available configuration](#available-configuration)

---

## Sweetalert

In your component add `Toast` trait. Then call `toast` method whenever you want.

```php
use Simtabi\Laratoast\HasLaratoasts;
use Livewire\Component;

class MyComponent extends Component
{
    use HasLaratoasts;

    public function save() {
        $this->fireSweetalertModal($titleText, $icon = null, $html = null, $options = []);
    }

}
```

**sweetalert parameters:**

- title
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**
- timeout: in milliseconds, default is 5000
-
---

## Toast

This is the normal sweetalert [modal](https://sweetalert2.github.io/#examples). In your component add `Fire` trait. Then call `fire` method whenever you want.

```php
use Simtabi\Laratoast\HasLaratoasts;
use Livewire\Component;

class MyComponent extends Component
{
    use HasLaratoasts;

    public function save() {
        $this->fireToastNotification($titleText, $icon = 'info', $timeout = 5000, $options = []);
    }

}
```

**toast parameters:**

Refer to the documentation online at: [https://github.com/kamranahmedse/jquery-toast-plugin](https://github.com/kamranahmedse/jquery-toast-plugin)

---

## Available configuration
