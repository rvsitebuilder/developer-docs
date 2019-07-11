# Directory Structure
  - [Laravel Directory Structure](#Laravel-Directory-Structure)
  - [RVsitebuilder App Directory Structure](#RVsitebuilder-App-Directory-Structure) 

<a name="Laravel-Directory-Structure"></a>
## Laravel Directory Structure

Beside [Laravel root directory and app directory](https://laravel.com/docs/master/structure), we introduce **packages** directory under root directory.  

```php
    ├── app
    ├── bootstrap
    ├── config
    ├── database
    ├── lib
    ├── packages/author/appname/
    ├── public
    ├── resources
    ├── routes
    ├── storage
    └── tests
    └── vendor
```
<a name="RVsitebuilder-App-Directory-Structure"></a>
## RVsitebuilder App Directory Structure 


Here is the example of file and directory structure for **/packages/author/appname/**. This is where your RVsitebuilder app will be stored. Simply generate your app from [RVsitebuilder app generator](creating-new-app) or create it manually.

```php
/packages/author/appname/
                    ├── config
                    ├── database
                    │   └── migrations
                    │       └── 2019_03_14_074812_regist_app_to_core_app.php
                    ├── routes
                    │   ├── Admin
                    │   │    └── web.php
                    │   └── User
                    │       └── web.php
                    ├── public
                    ├── resources
                    │   ├── images
                    │   │   └── icon-app.png
                    │   ├── js
                    │   ├── scss
                    │   ├── lang
                    │   └── views
                    │       ├── admin
                    │       │   ├── dashboard
                    │       │   │   └── index.blade.php
                    │       │   └── layouts
                    │       │        └── app.blade.php
                    │       └── user
                    │           ├── dashboard
                    │           │   └── index.blade.php
                    │           └── layouts
                    │               └── app.blade.php
                    │
                    ├── src
                    │   ├── AppServiceProvider.php
                    │   ├── Http
                    │   │   ├── Controllers
                    │   │   │   └── Admin
                    │   │   │       └── DashboardController.php
                    │   │   └── Requests
                    │   │   └── Middelware           
                    │   └── Models
                    │       └── Dashboard.php
                    ├── vendor
                    ├── app.json
                    ├── composer.json
                    ├── package.json
                    ├── webpack.base.js
                    └── webpack.mix.js
```
 
> {warning} Develop your application here. **DO NOT** change anything outside your app directory. It will not be exported to the production server. 
