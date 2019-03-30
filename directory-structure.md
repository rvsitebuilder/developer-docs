# Directory Structure

## Laravel Directory Structure

Beside [Laravel root directory and app directory](https://laravel.com/docs/master/structure), we introduce **packages** directory under root directory.  

<pre><code>.
├── app
├── bootstrap
├── config
├── database
├── lib
├── <b>/packages/author/app/</b>
├── public
├── resources
├── routes
├── storage
└── tests
└── vendor</code></pre>
 

## RVsitebuilder App Directory Structure 


Here is the example of file and directory structure for **/packages/author/app/**. This is where your RVsitebuilder app will be stored. Simply generate your app from [RVsitebuilder app generator]() or create it manually.

```
/packages/author/app/
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
 
Develop your application here. **DO NOT** change anything outside your app directory. It will not be exported to the production server. 
