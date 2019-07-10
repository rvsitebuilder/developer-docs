# App Event and Listener

 > {info} If you are not familiar with its concept. Check out the full [Laravel Events documentation](https://laravel.com/docs/master/events) to get started. 

  - [Creating Event and Listener](#Creating-Event-and-Listener) 
  - [Laravel Default Events](#Laravel-Default-Events)
  - [RVsitebuilder Default Events](#RVsitebuilder-Default-Events)
  - [Register Event and Listener on App’s Service Provider](#Register-Event-and-Listener-on-App-Service-Provider) 


<a name="Creating-Event-and-Listener"></a>
## Creating Event and Listener

Create Laravel blade file and keep it in your `app’s /src/Events` folder. 

```php
/packages/author/appname/
                    ├── src
                    │   ├── Events
                    │   │   ├── AfterSave.php
```

<a name="Laravel-Default-Events"></a>
## Laravel Default Events 
```php
php artisan event:list //5.8.9
```
<a name="RVsitebuilder-Default-Events"></a>
## RVsitebuilder Default Events

SavingPage 

SavedPage 

SavingEmail 

SavedEmail 

UpdatingApps 

UpdatedApps 

 
<a name="Register-Event-and-Listener-on-App-Service-Provider"></a>
## Register Event and Listener on App’s Service Provider 

Auto discovery
php artisan event:list  5.8.9