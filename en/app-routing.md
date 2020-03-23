# Routing

-   [Creating Route](#creating-route)
-   [Admin Route](#admin-route)
-   [User Route](#user-route)

> {info} If you are not familiar with its concept. Check out the full [Laravel Routing documentation](https://laravel.com/docs/master/routing) to get started.

## Creating Route

Create Laravel route file and keep it in your `app’s /routes` folder.

You should separate routing file for user and admin for easy grouping and authorization.

```php
/packages/vendor-name/project-name/
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
            'prefix' => 'project-name',
            'namespace' => 'vendor-name\project-name\Http\Controllers\Admin',
            'middleware' => 'admin',
    ], function () {
        Route::get('/', [
                    'as' => 'admin.project-name.dashboard.index',
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
    'prefix' => 'project-name',
    'middleware' => 'web',
], function () {
    Route::group([
        'prefix' => 'task',
        'namespace' => 'vendor-name\project-name\Http\Controllers\User',
    ], function () {
        // URI: /project-name/task
        Route::get('/', [
            'as' => 'project-name.task',
            'uses' => 'AppController@task',
        ]);
    });
});
```
