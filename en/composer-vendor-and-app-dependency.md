# Composer Vendor and App Dependency

Use Laravel vendor dependency inside your app with composer. 
 
## Composer Vendor Dependency 

Besides, the Laravel framework which come with `composer.json`, each RVsitebuilder app can contains its own `composer.json`. So you can specify your own vendor dependency and get export to the server separately.  

Make sure that you run `composer` command inside your app not the root directory. And add the `autoload-patch` in the `post-autoload-dump` section of your `app's composer.json` file. 

//Todo - @amarin if no package name enter, if it run all?

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
```

// Todo - @Settavut list all composer dependency and links here.
The following vendors already install by default. No need to install it separately on your app. 

- Xxxxx (https://github.com/link ) 
- Xxxxx (https://github.com/link ) 
- Xxxxx (https://github.com/link ) 


## Custom Vendor View Directory

If you require Laravel vendor inside your app and also want to custom vendor's view, you need to create `vendor` directory and register your app's view directory to `view.path` config.

<!-- TODO: @pam Is it necessary to call loadViewsFrom?
then call `loadViewsFrom` to tell the package to load it instead of default one inside the package. -->

Your `app's custom vendor directory`:
```
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

If you do this, you may need to copy code from vendor’s service provider to run `loadMigrationsFrom`, `mergeConfigFrom`, `loadViewsFrom`, `loadTranslationsFrom`, and etc. on your `app's service provider` yourself. Be notice that register and boot  on service provider are different. Do not mix it. 

> {warning} Wildcard `*` character inside of your app's `dont-discover` directive is not supported.



## RVsitebuilder App Dependency

You may want to extend other RVsitebuilder app or use it together with your app. It is very easy. All apps dependency will be installed while installing app on the production web site. 

Here is an example of `app’s app.json`:

```json
"requires": {
        "rvsitebuilder\/marketing": "^0.1.0"
    },
```

Its version constraint follow the same system as composer version constraint. You can find RVsitebuilder apps at [RVsitebuilder Marketplace](https://apps.rvsitebuilder.com). Enjoys! 
