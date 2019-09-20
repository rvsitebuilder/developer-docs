# Installation for Windows 10
  
If you don’t have any web server locally, follow these steps.

1. Goto https://github.com/rvsitebuilder/docker-lamp-php72
2. Follow step to install RVsitebuilder Docker
3. After that you will got dev environment like below (local ip coule be like 192.168.x.x) : 
```php
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
