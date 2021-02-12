# App Event and Listener

 > {info} If you are not familiar with its concept. Check out the full [Laravel Events documentation](https://laravel.com/docs/master/events) to get started.

- [Creating Event and Listener](#creating-event-and-listener)
- [Eloquent Model Events](#eloquent-model-events)
- [RVsitebuilder Application Events](#rvsitebuilder-application-events)
- [Register Event on App’s Service Provider](#register-event-on-apps-service-provider)
- [Register Listener on App’s Service Provider](#register-listener-on-apps-service-provider)
- [Listener](#listener)

<a name="Creating-Event-and-Listener"></a>

## Creating Event and Listener

<!-- TODO: @pairote ยังขาด listener, observer, subscriber  -->

Create Laravel blade file and keep it in your `app’s /src/Events` folder.

```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Events
                    │   │   ├── AfterSave.php
```

<a name="Eloquent-Model-Events"></a>

## Eloquent Model Events

Eloquent models fire several events **automatically**, allowing you to hook into the following points in a model's lifecycle: retrieved, creating, created, updating, updated, saving, saved,  deleting, deleted, restoring, restored.

 > {info} Check out the [Laravel Eloquent Events documentation](https://laravel.com/docs/master/eloquent#events) to get started.

<a name="RVsitebuilder-Application-Events"></a>

## RVsitebuilder Application Events
<!-- TODO: @apiruk ตรวจสอบว่าทำไม แสดงผลไม่ครบ ของ framework และ ของ เรา ไม่แสดงผล-->
You can find the full list of events using Artisan command.

```php
php artisan event:list
```

<!-- TODO: @apiruk ต้องปรับปรุงแก้ไขหัวข้อ manage hook https://app.clickup.com/t/t523b  และ เขียน document ให้ถูกด้วยครับ -->
```
`InstallingApp`, `InstalledApp`
`ActivattingApp`, `ActivatedApp` 
`ActivattingApp`, `InactivattedApp` 
`UninstallingApp`, `UninstalledApp` 
 beforeFrameworkUpdate()
 afterFrameworkUpdate()
 beforeWysiwygUpdate()
 afterWysiwygUpdate()
    beforeMigrate() ->AppsCleanStruct()
    afterMigrate()
    beforeVendorUpdate()
    afterVendorUpdate()
    beforeDownload()
    afterDownload()
    afterFinish)
```

<!-- TODO: @pam or @settavit ดำเนินการสร้าง event และ เขียน document ให้ถูกด้วยครับ -->

```
`SavingPage`, `SavedPage `
`SavingPost`, `SavedPost `
`SavingPostCategory`, `SavedPostCategory`
`SavingSystem`, `SavedgSystem`
`SavingEmail`, `SavedEmail`

New page
New post category
New post
New category

admin login
admin logout
user login
user logout

`SavingSiteConfig`, `SavedSiteConfig`
`SavingPageConfig`, `SavedPageConfig`
`SavingBlogConfig`, `SavedBlogConfig`
`SavingSystemConfig`, `SavedSystemConfig`

```

<a name="Register-Event-on-App-Service-Provider"></a>

## Register Event on App’s Service Provider
<!-- TODO: @pairote ขยายความ  -->

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

<a name="Register-Listener-on-App-Service-Provider"></a>
<!-- TODO: @pairote ขยายความ  -->
## Register Listener on App’s Service Provider

Your app can capture the events and hook your logic to the platform using:

* Listener:
* Observer: watches for specific things that happen within eloquent such as saving, saved, deleting, deleted, and etc.
* Subscriber: encapsulate all your listeners in the single class.

## Listener

Create On App’s Service Provider

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
