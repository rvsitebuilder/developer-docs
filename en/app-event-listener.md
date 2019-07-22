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
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Events
                    │   │   ├── AfterSave.php
```

### Generate the AfterSave event class.
```php
php artisan make:event AfterSave
```
```php
namespace VendorName\PackageName\Events;

use Illuminate\Queue\SerializesModels;

class AfterSave
{
    use SerializesModels;

    public $data = [];

    /**
     * Create a new event instance.
     *
     * @param Array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
```

<a name="Laravel-Default-Events"></a>
## Laravel Default Events 

You can find the full list of events using Artisan command.
```php
php artisan event:list
```
<a name="RVsitebuilder-Default-Events"></a>
## RVsitebuilder Default Events

`SavingPage`

`SavedPage `

`SavingEmail`

`SavedEmail`

`InstallingApp`

`InstalledApp`

`UpdatingApp`

`UpdatedApp` 

`SavingPageConfig`

`SavedPageConfig`

`SavingBlogConfig`

`SavedBlogConfig`

`SavingSystemConfig`

`SavedSystemConfig`


On your app can create listener to listen these events and hook your logic to the platform.

 
<a name="Register-Event-and-Listener-on-App-Service-Provider"></a>
## Register Event and Listener on App’s Service Provider 
 
```php
    public function register()
    {
        /**
            * The event listener mappings for the application.
        */
        $this->app['events']->listen(
            \Vendor-name\Package-name\Events\AfterSave::class, 
            \Vendor-name\Package-name\Listeners\SaveGlobalPost::class
        );
    }
```
