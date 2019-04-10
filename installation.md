# Installation

//TODO: @amarin How to install for developer


## Geting a developer license

You can install RVsitebuilder locally on your work station for developing purpose. Please buy hosting service from our [hosting partners](https://rvsitebuilder.com/hosting-partner/) to get the developer license. 

1. Log in to your RVsitebuilder website as admin, click ‘App launcher’ and go to ‘Manage’ app. 
1. Go to ‘Developer Token’ on the left menu. 
1. Enter your email, accept developer agreement and click generate developer token. 
1. It will require to install locally. 

## Server Requirement 

Same as Laravel, https://laravel.com/docs/master/installation#server-requirements. 


## RVsitebuilder Docker 

Skip this step, if you want to install on [Laravel Homestead](https://laravel.com/docs/master/homestead), [Laravel Valet](https://laravel.com/docs/master/valet), or your own web server.

If you don’t have any web server locally, follow these steps. 

1. Goto https://github.com/rvsitebuilder/docker-lamp-php72
1. Follow step to install RVsitebuilder Docker
1. After that you will got dev environment like below (local ip coule be like 192.168.x.x) : 
```
   http://<local_ip>:8080 for document root
   http://<local_ip>:8082 for phpMyAdmin
   
   document root path:
       <workspacke_path>/docker-lamp-php72/public/
   app path:
       <workspacke_path>/docker-lamp-php72/app/
       
   db access info:
      MARIADB_HOST = mariadb
      MARIADB_DATABASE = dbname
      MARIADB_USER = dbuser
      MARIADB_PASSWORD = dbpass
``` 

## Installation 

Please follow these steps: 

1. Download RVsitebuilder Setup wizard https://files.mirror1.rvsitebuilder.com/download/rvsitebuilderinstaller/setup to your local computer. 
1. Unzip the setup file 
1. Upload Folder rvsitebuilder to /public_html/ or /publc/ or /www/ 
1. Call the setup.php script for your domain name on browser http://mydomainname.com/rvsitebuilder/setup.php 
1. Follow the setup steps until finish. 
1. Enter developer license at manage app.

 

## .env configuration 

different between local and production 

- Local -  
- Production  

 
