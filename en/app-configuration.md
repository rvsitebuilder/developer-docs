# App Configuration

  - [Config](#Config)
  - [Register Config on App's Service Provider](#Register-Config-on-App's-Service-Provider)
  - [Access App's Configuration](#Access-App's-Configuration)
  - [Config Admin Interface ](#Config-Admin-Interface) 
  - [Get Custom Values on your config file](#Get-Custom-Values-on-your-config-file)
  - [Config Form Request Validation](#Config-Form-Request-Validation)

> {info} If you are not familiar with its concept. Check out the full [Laravel Configuration documentation](https://laravel.com/docs/master/configuration) to get started. 

<a name="Config"></a>
## Config 

Create Laravel config.php file and keep it in your `app’s /config` folder.

```php
/packages/vendor-name/package-name/
                    ├── config
```

Example of config.php
```php
<?php
use Rvsitebuilder\Core\Facades\RvsitebuilderService;
return [
    'key' => 'value'
];
```

<a name="Register-Config-on-App's-Service-Provider"></a>
## Register Config on App's Service Provider

On your `app's service provider`, load your config under `register` method. 

```php
public function register()
{
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'package-name'); 
}
```
> {warning} At this state, Laravel still not bind all services. You are still not able to access database, do not call it on config.php.



<a name="Access-App's-Configuration"></a>
## Access App's Configuration

The configuration values may be accessed using "dot" syntax, which includes the `package-name` declared on `mergeConfigFrom` and the `key` on the your config.php.

```php
config('package-name.key');
```


<a name="Config-Admin-Interface"></a>
## Config Admin Interface 

RVsitebuilder comes with the unified config admin interface on the admin manage app. Go to `apps launcher` choose manage, and choose `config` on the left menu. 
 
![configInterface](/images/configInterface.jpg)
 
To allow end-users change the value of your config online, you need to create a config blade file. And define it on your `app’s service provider`.
 
```php
public function boot()
{ 
    $this->defineConfigInterface();
}

protected function defineConfigInterface()
{
    // app('rvsitebuilderService')->siteConfigInterface('tab-name','package-name::blade-file-path');
    app('rvsitebuilderService')->siteConfigInterface('config','package-name::admin.config'); 
}
```

If you have a large configuration file, you may display it as multiple tabs by creating several config blade files, and call `siteConfigInterface` with different tab-name.

Here is an example of config blade file:
```html
<label>Github : </label> 
    <div class="">
        <input type="text" 
            name="key"
            value="config('package-name.key')">
    </div>
```
`key` must exist on your `app’s config.php` otherwise it will not be allowed to save.

Saving config on `Config Admin Interface` will store values to database on `core_setting` table. There is an event/listener to rebuilt custom config to  `/storage/dbconfig.json`. This will allow you continue to load config on the `register` method and safely run `artisan config:cache` if you wish.

If you modify config on table `core_setting` directly, you need to remove `/storage/dbconfig.json`. It will be re-generated automatcially.


<a name="Get-Custom-Values-on-your-config-file"></a>
## Get Custom Values on your config file

Use `RvsitebuilderService::getConfig` to get the custom config values from `/storage/dbconfig.json` and fallback to the default value on your `app's config.php`.

```php
return 
[
    'key' = RvsitebuilderService::getConfig('package-name.key', 'defaultValue') 
]
```
 
<a name="Config-Form-Request-Validation"></a>
## Config Form Request Validation

Saving config on `Config Admin Interface`  will always go to `RVsitebuilder's config controller`. However, you can validate the input end-user made by creating ConfigFormRequest.php. 
```php
/packages/vendor-name/package-name/
                    ├── config
                    ├── database
                    ├── routes
                    ├── public
                    ├── resources
                    ├── src
                    │   ├── AppServiceProvider.php
                    │   ├── Http
                    │   │   ├── Controllers
                    │   │   └── Requests
                    │   │   │   └── Admin
                    │   │   │       └── ConfigFormRequest.php
                    │   │   └── Middelware           
```
 
And define it on your `app’s service provider`.
```php
protected function defineConfigInterface()
{
    app('rvsitebuilderService')->configRequestValidation('ConfigFormRequest');  
}
```

Here is an example of config form request validation file:
```php
public function rules()
{        
    return [  
            'key' => 'required'
    ]
}
``` 

