# App Configuration

  - [Config](#Config)
  - [Register Config on App's Service Provider](#Register-Config-on-App's-Service-Provider)
  - [Overwrite Vendor Configuration](#Overwrite-Vendor-Configuration) 
  - [Config Admin Interface ](#Config-Admin-Interface) 
  - [Config Form Request Validation](#Config-Form-Request-Validation)
  - [Saving custom values on database](#Saving-custom-values-on-database) 
  - [RvsitebuilderService::getConfig](#RvsitebuilderService-getConfig)
  - [Access App's Configuration](#Access-App's-Configuration)

> {info} If you are not familiar with its concept. Check out the full [Laravel Configuration documentation](https://laravel.com/docs/master/configuration) to get started. 

<a name="Config"></a>
## Config 

Create Laravel config file and keep it in your `app’s /config` folder.

```php
/packages/author/appname/
                    ├── config
```
<a name="Register-Config-on-App's-Service-Provider"></a>
## Register Config on App's Service Provider

On your `app's service provider`, load your config under `register` method. 

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'app-name'); 
}
```
> {warning} At this state, Laravel still not bind all services. You cannot access database yet, do not call it on config.php.

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
    config('totem.artisan.whitelist', true);
    config('totem.artisan.command_filter', ['*:cache', 'queue:work', 'medialibrary:*']);
}
```

<a name="Config-Admin-Interface"></a>
## Config Admin Interface 

RVsitebuilder comes with the unified config admin interface on the admin manage app. Go to `apps launcher` choose manage, and choose `config` on the left menu. To allow end-users change the value of your config online, you need to create a config blade file. And define it on your `app’s service provider`.

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
<a name="Config-Form-Request-Validation"></a>
## Config Form Request Validation

Saving config on `Config Admin Interface`  will go to `RVsitebuilder's config controller`. You can validate the input end-user made by creating AppConfigRequest.php.

<!-- TODO: @pam exmple here -->
```php
public function boot() { 
    $this->defineConfigValidation('AppConfigRequest.php');
}
```
<a name="Saving-custom-values-on-database"></a>
## Saving custom values on database

Saving config on `Config Admin Interface` will store values to database on `core_setting` table. There is an event/listener to rebuilt custom config to  `/storage/dbconfig.json`. This will allow you continue to load config on the `register` method and safely run `artisan config:cache` if you wish.

If you modify config on table `core_setting` directly, you need to remove `/storage/dbconfig.json`. It will be re-generated automatcially.

<a name="RvsitebuilderService-getConfig"></a>
## RvsitebuilderService::getConfig

Use `RvsitebuilderService::getConfig` to get the custom config values from `/storage/dbconfig.json` and fallback to the default value on your `app's config.php`.

```php
return [
    'config' = RvsitebuilderService::getConfig('app-name.config', 'defaultValue') 
]
```

<a name="Access-App's-Configuration"></a>
## Access App's Configuration

The configuration values may be accessed using "dot" syntax, which includes the name of the file and the option you wish to access. 

```php
config('app-name.config');
```


