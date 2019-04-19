# Routing

> {info} If you are not familiar with its concept. Check out the full [Laravel Routing documentation](https://laravel.com/docs/master/routing) to get started. 

## Creating Route

Create Laravel route file and keep it in your `app’s /routes` folder. 

You should separate routing file for user and admin for easy grouping and authorization. 
```
/packages/author/appname/
                    ├── routes
                    │   ├── Admin
                    │   │    └── web.php
                    │   └── User
                    │       └── web.php
```

## Admin Route 

Admin route must group using `admin prefix`, and use `admin middleware`. Only admin will be able to access it. 

```php
<?php

Route::group([
        'prefix' => 'admin',
        'middleware' => 'web',
], function () {
    Route::group([
            'prefix' => 'appname',
            'namespace' => 'Author\Appname\Http\Controllers\Admin',
            'middleware' => 'admin',
    ], function () {
        Route::get('/', [
                    'as' => 'admin.appname.dashboard.index',
                    'uses' => 'DashboardController@index',
            ]);
    });
});
```
 ## User Route 

You don't need to have a user route if your app only for admin. 

Be acknowledge that there is `FrontendACLRole middleware` to check user's role and permission, page visibilites, draft, and etc. Here is an example of user route:

```php
<?php
Route::group([
    'prefix' => 'appname',
    'middleware' => 'web',
], function () {
    Route::group([
        'prefix' => 'task',
        'namespace' => 'Author\Appname\Http\Controllers\User',
    ], function () {
        // URI: /appname/task
        Route::get('/', [
            'as' => 'appname.task',
            'uses' => 'AppController@task',
        ]);
    });
});
```

## Configurable Named Route

> {info} This feature will be available on v7.2.

If you want to allow end-user to change your app’s named route to a different route, you need to register its name on your service provider. The simple use case is the `user.dashboard` named route. User will be able to change the route to its own instead of default one on ‘Admin > Config > Route’ click tab ‘Named route‘. 

```php
public function boot() { 
    $this->defineDynamicNamedRoute()  

} 

public function dynamicNamedRoute (){ 
    
} 
```