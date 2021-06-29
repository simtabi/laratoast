# Laratoast

Integrate livewire with sweetalert.

- [Installation](#installation)
- [How to use](#how-to-use)
- [Toast](#toast)
- [Fire](#fire)
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
    @livewireScripts
    @laratoastScripts // or whenever you need
    ...
```

### 3. Extra config file <!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=laratoast-config`.
> See [available configuration](#available-configuration)

---

## Toast

In your component add `Toast` trait. Then call `toast` method whenever you want.

```php
use Simtabi\Laratoast\FireToast;
use Livewire\Component;

class MyComponent extends Component
{
    use FireToast;

    public function save() {
        $this->toast('Toast message', 'success', 5000)
    }
    ...
}
```

**toast parameters:**

- title
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**
- timeout: in milliseconds, default is 5000
-
---

## Fire

This is the normal sweetalert [modal](https://sweetalert2.github.io/#examples). In your component add `Fire` trait. Then call `fire` method whenever you want.

```php
use Simtabi\Laratoast\FireSwal;
use Livewire\Component;

class MyComponent extends Component
{
    use FireSwal;

    public function save() {
        $options = [];
        $this->Fire('Error happened', 'error', 'please try again later', $options)
    }
    ...
}
```

**fire parameters:**

- titleText: The title of the popup, as text to avoid HTML injection.
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**.
- html: the html which is displayed under the title.
- options: [all options](https://sweetalert2.github.io/#configuration) that sweetalert provides.

---

## Available configuration
