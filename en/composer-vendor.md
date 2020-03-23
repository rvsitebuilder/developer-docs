# Composer Vendor and App Dependency

-   [Composer Vendor Dependency](#composer-vendor-dependency)
-   [Disable Vendor Service Provider Auto Discovery](#disable-vendor-service-provider-auto-discovery)
-   [Publishing Vendor Asset](#publishing-vendor-asset)
-   [Define Migrate for Vendor](#define-migrate-for-vendor)
-   [Overwrite Vendor Configuration](#overwrite-vendor-configuration)
-   [Custom Vendor View Directory](#custom-vendor-view-directory)

Use Laravel vendor dependency inside your app with composer.

## Composer Vendor Dependency

Besides, the Laravel framework which come with `composer.json`, each RVsitebuilder app can contains its own `composer.json`. So you can specify your own vendor dependency and get export to the server separately.

Make sure that you run `composer` command on RVsitebuilder root directory, not inside your app.

Here is an example of scheduler `app's composer.json`:

```json
{
    "name": "rvsitebuilder/scheduler",
    "require": {
        "studio/laravel-totem": "^4.0"
    },
    "autoload": {
        "psr-4": {
            "Rvsitebuilder\\Scheduler\\": "src/"
        }
    },
    "extra": {
        "laravel": {
            "providers": ["Rvsitebuilder\\Scheduler\\SchedulerServiceProvider"]
        }
    }
}
```

## Disable Vendor Service Provider Auto Discovery

Vendor that comes with view and route, may not display nicely in RVsitebuilder layout and may have security risk if you leave it accessible. You can disable Laravel vendor discovery by adding the vendor name in the `dont-discover` section on your `app’s composer.json` file.

```json
"extra": {
    "laravel": {
        "dont-discover": [
            "barryvdh/laravel-debugbar"
        ]
    }
},
```

If you do this, you may need to copy code from vendor’s service provider to run `loadMigrationsFrom`, `mergeConfigFrom`, `loadViewsFrom`, `loadTranslationsFrom`, and etc. on your `app's service provider` yourself. Be notice that register and boot on service provider are different. Do not mix it.

> {warning} Wildcard `*` character inside of your app's `dont-discover` directive is not supported.

## Publishing Vendor Asset

In case you disable `vendor's service provider`, you will need to copy `vendor's public resources` to app and `publishes` on your `app's service provider`.

<!-- TOD: @wi laravel-filemanager ทำอย่างไร -->

## Define Migrate for Vendor

In case you disable `vendor's service provider`, you will need to copy `vendor's migrations` to your app and call `loadMigrationsFrom` on your `app's service provider`.

```php
public function boot()
{
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
}
```

Once your `app's service provider` have been registered, they will automatically be run when the php artisan migrate command is executed. You do not need to export them to the application's main `database/migrations` directory.

## Overwrite Vendor Configuration

If you rely on other composer projects and want to overwrite its configuration, just copy `vendor's config` to your config folder and run `mergeConfigFrom` from your `app's service provider`.

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/vendor.php', 'vendor-name');
}
```

`MergeConfigFrom` function only merges the first level of the configuration array. If you have a complex configuration, use `config()` helper to overwrite it individually. Here is an example:

```php
public function register()
{
    config('totem.artisan.whitelist', true);
    config('totem.artisan.command_filter', ['*:cache', 'queue:work', 'medialibrary:*']);
}
```

## Custom Vendor View Directory

If you run Laravel vendor inside your app and also want to custom vendor's view without to override the vendor controller that call view command, you need to create `vendor` directory and register your custom vendor's view directory to `view.path` config.

Your `app's custom vendor directory`:

```php
/packages/vendor-name/project-name/
                    ├── resources
                    │   └── views
                    │       ├── admin
                    │       ├── user
                    │       └── vendor
```

Your `app's service provider`:

```php
public function register()
{
    $collection = collect($this->app['config']['view']['paths']);
    $collection->prepend(__DIR__.'/../resources/views');
    $this->app['config']->set('view.paths', $collection->toArray());
}
```

Noted that `view.path` is the directory that contains vendor directory. Above example is correct. It does not have vendor after /resources/views.
