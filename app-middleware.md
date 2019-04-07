# App Middelware

> {info} If you are not familiar with its concept. Check out the full [Laravel Middleware documentation](https://laravel.com/docs/master/middleware) to get started. 

## Creating Middleware

Create Laravel middleware file and keep it in your `app’s /src/Http/Middleware` folder. 

```
/packages/author/appname/
                    ├── src
                    │   ├── Http
                    │   │   └── Middelware           

```

## Global middleware 

In additional to default Laravel middleware, RVsitebuilder added the following global middleware. 

- `\App\Http\Middleware\LastRoute::class`: To allow dynmic route on RVsitebuilder CMS system. 
- `\App\Http\Middleware\RemoveIlligalCharactor::class`: To remove all submited requests contain Backtick(`).
- `\App\Http\Middleware\RenderWidget`: To render RVsitebuilder widget.
- `\App\Http\Middleware\ReplaceTemplateVariable`: To replace RVsitebuilder template variables.
- `\App\Http\Middleware\FrontendACLRole`: To control permission, and visibility options.  
 

## Register App’s Middleware 

You can directly push your app’s middleware to `group middleware` and `global middleware` from your service provider. Here is an example of code:

```php
public function boot() { 
    $this->registerMiddleware()
} 

public function registerMiddleware(){
    $router = app()->make(Router::class); 
    $router->pushMiddlewareToGroup('web', MyPackage\Middleware\YourMiddleware::class); 
    

    $kernel = app()->make(Kernel::class); 
    $kernel->pushMiddleware(MyPackage\Middleware\YourMiddleware::class); 
} 
```
