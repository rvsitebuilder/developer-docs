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

//Todo - @Settavut list all composer dependency and links here.
The following vendors already install by default. No need to install it separately on your app. 

- Xxxxx (https://github.com/link ) 
- Xxxxx (https://github.com/link ) 
- Xxxxx (https://github.com/link ) 


## Custom Vendor View Directory

If you require Laravel package inside your app and also want to custom package's view, you need to set `view.path` config to your app's view directory then call `loadViewsFrom` to tell the package to load it instead of default one inside the package.

//TODO: correct syntax and directory
Your app's custom vendor view directory:
```
--view
-----admin
-----user
-----vendor
```

Your app's service provider:
```php
public function boot()
{
    config(['view.path' => '../../views']);
    $this->loadViewsFrom(__DIR__.'/path/to/views', 'courier');
}
```

Noted that `view.path` is the directory that contains vendor directory.

## RVsitebuilder App Dependency

You may want to extend someone app or use it together with your app. It is very easy. All apps dependency will be installed while installing app on the production web site. 

Here is an example of `app.json`:

```json
"requires": {
        "rvsitebuilder\/marketing": "^0.1.0"
    },
```

Its version constraint follow the same system as composer version constraint. You can find RVsitebuilder apps at [RVsitebuilder Marketplace](https://apps.rvsitebuilder.com). Enjoys! 
