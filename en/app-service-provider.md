# App Service Provider

  - [App Service Provider](#App-Service-Provider)
  - [App Service Provider Auto Discovery ](#App-Service-Provider-Auto-Discovery) 

Laravel service providers are the connection points between your app and Laravel. 

> {info} If you are not familiar with its concept. Check out the full [Laravel Service Provider documentation](https://laravel.com/docs/master/packages) to get started. 

<a name="App-Service-Provider"></a>
## App Service Provider 

Create Laravel service provider file and keep it in your `app’s /src` folder. 

```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── AppServiceProvider.php
```
<a name="App-Service-Provider-Auto-Discovery"></a>
## App Service Provider Auto Discovery  

You need to define the provider in the extra section of your `app's composer.json` file. 

```json
{
"extra": {
    "laravel": {
        "providers": [
            "vendor-name\\package-name\\AppnameServiceProvider"
        ] 
    }
},
```

Generating new app from the developer app will add service provider auto discovery to your `app’s composer.json` automatically. 

 
