# App Configuration

> {info} If you are not familiar with its concept. Check out the full [Laravel Configuration documentation](https://laravel.com/docs/master/configuration) to get started. 


## Config 

Create Laravel config file and keep it in your `app’s /config` folder. 

## Register Config on App's Service Provider

On your `app's service provider`, load your config under `register` method. 

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'name'); 
}
```
> {warning} At this state, Laravel still not bind all services. You cannot access database yet, do not call it on config.php.


## Overwrite Vendor Configuration

If you rely on other composer packages and want to overwrite its configuration, you can do it on your `app's service provider`. Just copy config file of your vendor to your config folder and run `mergeConfigFrom` from your app's service provider.

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/vendor.php', 'vendor-name');
}
```

`MergeConfigFrom` function only merges the first level of the configuration array. If you have a complex configuration, use `$this->app['config']->set` to set it individually. Here is an example:

```php
public function register()
    $this->app['config']->set('totem.artisan.whitelist', true);
    $this->app['config']->set('totem.artisan.command_filter', ['*:cache', 'queue:work', 'medialibrary:*']);
}
```


## Config User Interface 

RVsitebuilder comes with the unified config user interface on the admin manage app. Go to `apps launcher` choose manage, and choose `config` on the left menu. To allow end-users change the value of your config online, you need to create a config blade file. And define it on your `app’s service provider`. You can define 1 config interface per app.  

//TODO: @apiruk final config user interface 

```php
public function boot() { 
    $this->defineConfigInterface('admin.cofig.blade.php');
}
```

Here is an example of config blade file:
```php
xxxx
```

You can have multiple tabs, on your config interface.
```php
xxxx
```



## Saving custom values 

Your custom values will be stored on database on `core_setting` table and then cached on `/boostrap/config.php`. If you modify config on database directly, you need to run `artisan config:cache` to make it effective. 



## Default Values and Custom Values 

If you allow end-user to change the config value from the config user interface, you need to get the custom value, and fallback to app’s default value on your `app's config.php`.

```php
return [
    Abc = CoreSetting::DB(‘abc’) ?? $defaultValue, 
]
```

 
## Access App's Configuration

The configuration values may be accessed using "dot" syntax, which includes the name of the file and the option you wish to access. 

```
config('app.config');
```


