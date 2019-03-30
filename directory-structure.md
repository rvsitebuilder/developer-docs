# Directory Structure

## Laravel Directory Structure

Beside [Laravel root directory and app directory](https://laravel.com/docs/master/structure), we introduce ‘packages’ directory under root directory.  

```
/app 

/.. 

/packages/name/app/ 

/public 

/vendor 
```
 

## RVsitebuilder App Ddirectory Structure 


Here is file and directory structure for /packages/name/app/. This is where your RVsitebuilder app will be stored.  

```

/config 

/public 

/resource/... 

/src/.... 

/composer.json 
/package.json 

/app.json 
```
 
Develop your application here. *DO NOT* change anything outside your app directory. It will not be exported to the production server. 
