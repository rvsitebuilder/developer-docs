# Installation

- [Getting a developer license](#getting-a-developer-license)
- [RVsitebuilder Docker (Recommended)](#rvsitebuilder-docker-recommended)
  - [docker requirement](#docker-requirement)
  - [docker up](#docker-up)
  - [call web installer](#call-web-installer)
- [Other environment](#other-environment)
- [.env configuration](#env-configuration)

## Getting a developer license

You can install RVsitebuilder locally on your work station for developing purpose. Please register to [RVsitebuilder Register](https://dev.rvsitebuilder.com/) to get the developer license.

1. Register and Login to [RVsitebuilder](https://dev.rvsitebuilder.com/)
   ![DeveloperDashboard](images/Installation/Developer-license-index.png)

2. Go to [Developer Dashboard](https://dev.rvsitebuilder.com/devportal)
   ![DeveloperDashboard](images/Installation/Developer-license.png)

   When you come to `Developer Dashboard` :

   **Developer Token Auth** You can copy `My Developer Token Auth` go to `Verify License your website`,It will require to install locally.

## RVsitebuilder Docker (Recommended)

Download and extract https://github.com/rvsitebuilder/docker-lamp to your workspace

### docker requirement

docker version 19.03.8+,

docker-compose version 1.25.4+

### docker up
~~~
cd workspace/docker-lamp
docker-compose up -d
~~~

### call web installer

http://127.0.0.1

1. Download and Extract https://github.com/rvsitebuilder/docker-lamp/archive/master.zip to your workspace
2. update docker .env file

```
Optional to change WEBSERVER_PORT,LOCALE,TZ
```

3. run docker build and up

```
cd <workspacke_path>/docker-lamp/docker

docker-compose -f docker-compose.yml up -d
```

4. After that you will got dev environment like below (local ip coule be like 192.168.x.x) :

```php
   http://<local_ip>:80 for document root
   http://<local_ip>:80/phpmyadmin for phpMyAdmin

   document root path:
       <workspacke_path>/docker-lamp/public/
   app path:
       <workspacke_path>/docker-lamp/app/

   db access info:      
      MYSQL_USER_NAME = homestead
      MYSQL_USER_DB = homestead
      MYSQL_USER_PASS = secret
```

5. Open browser http://<local_ip>:8080

```
admin user: admin@admin.com
admin pass: rvsitebuilder
```

## Other environment

1 Prepare web server stack
   You can choose to run docker container like [Laravel Homestead](https://laravel.com/docs/5.8/homestead), [Laravel Valet](https://laravel.com/docs/5.8/valet), or your own web server.
 
But make sure that your domain configuration meet with the following requirements.

- Domain name must run on PHP7.1.3 or above.
- php extension: 'mysqlnd','pdo','gd','curl','iconv','mbstring','zip','posix_getpwuid','json'
- php ini config 'memory_limit' => 64M
- Firewall on your server doesn't block the following domains.  
  download.rvglobalsoft.com  
  Files.mirror1.rvsitebuilder.com

mysql already run
      MYSQL_USER_NAME = homestead
      MYSQL_USER_DB = homestead
      MYSQL_USER_PASS = secret
  

2. Download file [https://raw.githubusercontent.com/rvsitebuilder/docker-lamp-php72/master/public/index.php](https://raw.githubusercontent.com/rvsitebuilder/docker-lamp/master/public/index.php)and copy to web document root
3. Open browser http://<local_ip>:80 and follow wizard installation

4. After install complete you can login with 

```
admin user: admin@admin.com
admin pass: rvsitebuilder
```

## .env configuration

Different between local and production

- Local
- Production
