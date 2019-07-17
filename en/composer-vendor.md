# Composer Vendor and App Dependency

  - [Composer Vendor Dependency](#Composer-Vendor-Dependency) 
  - [Disable Vendor Service Provider Auto Discovery](#Disable-Vendor-Service-Provider-Auto-Discovery )
  - [Publishing Vendor Asset](#Publishing-Vendor-Asset)
  - [Define Migrate for Vendor](#Define-Migrate-for-Vendor)
  - [Overwrite Vendor Configuration](#Overwrite-Vendor-Configuration)
  - [Custom Vendor View Directory](#Custom-Vendor-View-Directory) 
  
Use Laravel vendor dependency inside your app with composer. 
 
<a name="Composer-Vendor-Dependency"></a>
## Composer Vendor Dependency 

Besides, the Laravel framework which come with `composer.json`, each RVsitebuilder app can contains its own `composer.json`. So you can specify your own vendor dependency and get export to the server separately.  

<!-- Todo - @amarin change composer to new workflow https://app.clickup.com/t/13nk3j -->
<!-- 
Make sure that you run `composer` command inside your app not the root directory. And add the `autoload-patch` in the `post-autoload-dump` section of your `app's composer.json` file. 

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
            "providers": [
                "Rvsitebuilder\\Scheduler\\SchedulerServiceProvider"
            ] 
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "@php ../../../autoload-patch rvsitebuilder/scheduler"            
        ]
    }
}
``` -->

<a name="Disable-Vendor-Service-Provider-Auto-Discovery"></a>
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

<a name="Publishing-Vendor-Asset"></a>
## Publishing Vendor Asset

In case you disable `vendor's service provider`, you will need to `define vendor asset` on your `app's service provider`. 


<!-- TODO: @pairote how to define vendor asset  -->
```php
php artisan vendor:publish 
```
 
 
<a name="Define-Migrate-for-Vendor"></a>
## Define Migrate for Vendor

In case you disable `vendor's service provider`, you will need to call `loadMigrationsFrom` on your `app's service provider`. 
 
```php
public function boot()
{
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
}
```
Once your `app's service provider` have been registered, they will automatically be run when the php artisan migrate command is executed. You do not need to export them to the application's main `database/migrations` directory.



<a name="Overwrite-Vendor-Configuration"></a>
## Overwrite Vendor Configuration

If you rely on other composer packages and want to overwrite its configuration, you can do it on your `app's service provider`. Just copy config file of your vendor to your config folder and run `mergeConfigFrom` from your app's service provider.

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


<a name="Custom-Vendor-View-Directory"></a>
## Custom Vendor View Directory
 
If you run Laravel vendor inside your app and also want to custom vendor's view without to override the vendor controller that call view command, you need to create `vendor` directory and register your app's view directory to `view.path` config.

 
You need call `loadViewsFrom` when your package have UI. then call `loadViewsFrom` to tell the package to load it instead of default one inside the package. 

Your `app's custom vendor directory`:
```php
/packages/author/appname/
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

Noted that `view.path` is the directory that contains vendor directory. Above example does not have vendor after /resources/views is correct.


