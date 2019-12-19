# App Middelware

- [Creating Middleware](#creating-middleware)
- [Global middleware](#global-middleware)
- [Register App’s Middleware](#register-apps-middleware)

> {info} If you are not familiar with its concept. Check out the full [Laravel Middleware documentation](https://laravel.com/docs/master/middleware) to get started.

<a name="Creating-Middleware"></a>

## Creating Middleware

Create Laravel middleware file and keep it in your `app’s /src/Http/Middleware` folder.

```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Http
                    │   │   └── Middelware

```

<a name="Global-middleware"></a>

## Global middleware

In additional to default Laravel middleware, RVsitebuilder added the following global middleware.

- `\App\Http\Middleware\LastRoute::class`: To allow dynmic route on RVsitebuilder CMS system.
- `\App\Http\Middleware\RemoveIlligalCharactor::class`: To remove all submited requests contain Backtick(`).
- `\App\Http\Middleware\RenderWidget`: To render RVsitebuilder widget.
- `\App\Http\Middleware\ReplaceTemplateVariable`: To replace RVsitebuilder template variables.
- `\App\Http\Middleware\FrontendACLRole`: To control permission, and visibility options.

<a name="Register-App’s-Middleware"></a>

## Register App’s Middleware

You can directly push your app’s middleware to `group middleware` and `global middleware` from your service provider. Here is an example of code:

```php
public function register() {
    $this->registerMiddleware()
}

public function registerMiddleware() {
    // Push middleware to a specific middleware group
    $router = $this->app['router'];
    $router->pushMiddlewareToGroup('web', \MyPackage\Middleware\YourMiddleware::class);

    // Push middleware to a global middleware, it will be run for all group such as web and api
    $kernel = app()->make(\Illuminate\Contracts\Http\Kernel::class);
    $kernel->pushMiddleware(\MyPackage\Middleware\YourMiddleware::class);
}
```
