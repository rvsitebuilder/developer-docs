# App Configuration

> {info} If you are not familiar with its concept. Check out the full [Laravel Configuration documentation](https://laravel.com/docs/master/configuration) to get started. 


## Config 

Create Laravel config file and keep it in your `app’s /config` folder. 
```
/packages/author/appname/
                    ├── config
```

## Register Config on App's Service Provider

On your `app's service provider`, load your config under `register` method. 

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'app-name'); 
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

`MergeConfigFrom` function only merges the first level of the configuration array. If you have a complex configuration, use `config()` helper to overwrite it individually. Here is an example:

```php
public function register()
    config('totem.artisan.whitelist', true);
    config('totem.artisan.command_filter', ['*:cache', 'queue:work', 'medialibrary:*']);
}
```


## Config User Interface 

RVsitebuilder comes with the unified config user interface on the admin manage app. Go to `apps launcher` choose manage, and choose `config` on the left menu. To allow end-users change the value of your config online, you need to create a config blade file. And define it on your `app’s service provider`.

<!-- TODO: @settavut final config user interface  -->

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

## Saving custom values on database

Saving config on `Config User Interface` will store values to database on `core_setting` table. There is an event/listener to rebuilt custom config to  `/storage/dbconfig.json`. This will allow you continue to load config on the `register` method and safely run `artisan config:cache` if you wish.

If you modify config on table `core_setting` directly, you need to remove `/storage/dbconfig.json`. It will be re-generated automatcially.

## RvsitebuilderService::getConfig

Use `RvsitebuilderService::getConfig` to get the custom config values from `/storage/dbconfig.json` and fallback to the default value on your `app's config.php`.

```php
return [
    'config' = RvsitebuilderService::getConfig('app-name.config', 'defaultValue') 
]
```

 
## Access App's Configuration

The configuration values may be accessed using "dot" syntax, which includes the name of the file and the option you wish to access. 

```
config('app-name.config');
```


