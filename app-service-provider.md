# App Service Provider

Laravel service providers are the connection points between your app and Laravel. 

> {info} If you are not familiar with its concept. Check out the full [Laravel Service Provider documentation](https://laravel.com/docs/master/packages) to get started. 

## App Service Provider Auto Discovery  

You need to define the provider in the extra section of your `app's composer.json` file. 

```json
{
"extra": {
    "laravel": {
        "providers": [
            "Rvsitebuilder\\Scheduler\\SchedulerServiceProvider"
        ] 
    }
},
```

Generating new app from the developer app will add service provider auto discovery to your `app’s composer.json` automatically. 

## Disable Vendor Service Provider Auto Discovery 

Vendor that comes with view and route, may not display nicely in RVsitebuilder layout and may implode security risk if you leave it accessible. You can disable Laravel package discovery by adding the package name in the `dont-discover` section on your app’s `composer.json` file. 

```json
"extra": {
    "laravel": {
        "dont-discover": [
            "barryvdh/laravel-debugbar"
        ]
    }
},
```

You may disable package discovery for all packages using the `*` character inside of your application's `dont-discover` directive: 

```json
"extra": {
    "laravel": {
        "dont-discover": [
            "*"
        ]
    }
},
```

If you do this, you may need to copy code from vendor’s service provider to run `loadMigrationsFrom`, `mergeConfigFrom`, `loadViewsFrom`, `loadTranslationsFrom`, and etc. on your service provider yourself. Be notice that register and boot are different. Do not mix it. 

 