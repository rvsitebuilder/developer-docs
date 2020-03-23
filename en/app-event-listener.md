# App Event and Listener

> {info} If you are not familiar with its concept. Check out the full [Laravel Events documentation](https://laravel.com/docs/master/events) to get started.

-   [Creating Event and Listener](#creating-event-and-listener)
-   [Eloquent Model Events](#eloquent-model-events)
-   [RVsitebuilder Application Events](#rvsitebuilder-application-events)
-   [Register Event on App’s Service Provider](#register-event-on-apps-service-provider)
    -   [Dispatching Events](#dispatching-events)
-   [Register Listener on App’s Event Service Provider](#register-listener-on-apps-event-service-provider)
    -   [Listener](#listener)
    -   [Dispatching Listeners](#dispatching-listeners)
    -   [Rvsitebuilder Event](#rvsitebuilder-event)

## Creating Event and Listener

<!-- TODO: @pairote ยังขาด listener, observer, subscriber  -->

Create Laravel blade file and keep it in your `app’s /src/Events` folder.

```php
/packages/vendor-name/project-name/
                    ├── src
                    │   ├── Events
                    │   │   ├── Uninstaling.php
                    │   │   ├── Uninstalled.php
```

## Eloquent Model Events

Eloquent models fire several events **automatically**, allowing you to hook into the following points in a model's lifecycle: retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored.

> {info} Check out the [Laravel Eloquent Events documentation](https://laravel.com/docs/master/eloquent#events) to get started.

## RVsitebuilder Application Events

<!-- TODO: @apiruk ตรวจสอบว่าทำไม แสดงผลไม่ครบ ของ framework และ ของ เรา ไม่แสดงผล-->

You can find the full list of events using Artisan command.

```php
php artisan event:list
```

<!-- TODO: @apiruk ต้องปรับปรุงแก้ไขหัวข้อ manage hook https://app.clickup.com/t/t523b  และ เขียน document ให้ถูกด้วยครับ -->

| Event                                                   |                       Listeners                        |
| ------------------------------------------------------- | :----------------------------------------------------: |
| Illuminate\Mail\Events\MessageSending                   |    Rvsitebuilder\Email\Listeners\LogSendingMessage     |
| Illuminate\Mail\Events\MessageSent                      |      Rvsitebuilder\Email\Listeners\LogSentMessage      |
| Rvsitebuilder\Blog\Events\CreatedCategory               |                                                        |
| Rvsitebuilder\Blog\Events\CreatedPost                   |                                                        |
| Rvsitebuilder\Blog\Events\CreatingCategory              |                                                        |
| Rvsitebuilder\Blog\Events\CreatingPost                  |                                                        |
| Rvsitebuilder\Developer\Events\AfterSettingCreatedEvent |   Rvsitebuilder\Developer\Listeners\SettingListener    |
| Rvsitebuilder\Manage\Events\Artisaned                   |                                                        |
| Rvsitebuilder\Manage\Events\Artisaning                  |                                                        |
| Rvsitebuilder\Manage\Events\Disabled                    |      Rvsitebuilder\Manage\Listeners\Disabled\Page      |
|                                                         |      Rvsitebuilder\Manage\Listeners\Disabled\Blog      |
|                                                         |     Rvsitebuilder\Manage\Listeners\Disabled\System     |
|                                                         |      Rvsitebuilder\Manage\Listeners\Disabled\Menu      |
| Rvsitebuilder\Manage\Events\Disabling                   |                                                        |
| Rvsitebuilder\Manage\Events\Enabled                     |    Rvsitebuilder\Manage\Listeners\Enabled\PageQueue    |
|                                                         |    Rvsitebuilder\Manage\Listeners\Enabled\BlogQueue    |
|                                                         |     Rvsitebuilder\Manage\Listeners\Enabled\System      |
|                                                         |      Rvsitebuilder\Manage\Listeners\Enabled\Menu       |
| Rvsitebuilder\Manage\Events\Enabling                    |                                                        |
| Rvsitebuilder\Manage\Events\Installed                   |                                                        |
| Rvsitebuilder\Manage\Events\Installing                  |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\BlogSaved        |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\BlogSaving       |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\PageSaved        |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\PageSaving       |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\PostSaved        |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\PostSaving       |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\SiteSaved        |     Rvsitebuilder\Manage\Listeners\CachingProcess      |
| Rvsitebuilder\Manage\Events\SiteConfig\SiteSaving       |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\SystemSaved      |                                                        |
| Rvsitebuilder\Manage\Events\SiteConfig\SystemSaving     |                                                        |
| `Rvsitebuilder\Manage\Events\Uninstalled`               |    Rvsitebuilder\Manage\Listeners\Uninstalled\Page     |
|                                                         |    Rvsitebuilder\Manage\Listeners\Uninstalled\Blog     |
|                                                         |   Rvsitebuilder\Manage\Listeners\Uninstalled\System    |
|                                                         |    Rvsitebuilder\Manage\Listeners\Uninstalled\Menu     |
| `Rvsitebuilder\Manage\Events\Uninstalling`              |                                                        |
| Rvsitebuilder\Wysiwyg\Events\ChainProcessSaved          | Rvsitebuilder\Wysiwyg\Listeners\SaveThumbAndFeatureImg |
| Rvsitebuilder\Wysiwyg\Events\ChainProcessSaving         |                                                        |
| SocialiteProviders\Manager\SocialiteWasCalled           |   SocialiteProviders\Line\LineExtendSocialite@handle   |
| Studio\Totem\Events\Activated                           |            Studio\Totem\Listeners\BustCache            |
|                                                         |           Studio\Totem\Listeners\BuildCache            |
| Studio\Totem\Events\Created                             |            Studio\Totem\Listeners\BustCache            |
|                                                         |           Studio\Totem\Listeners\BuildCache            |
| Studio\Totem\Events\Deactivated                         |            Studio\Totem\Listeners\BustCache            |
|                                                         |           Studio\Totem\Listeners\BuildCache            |
| Studio\Totem\Events\Deleting                            |      Studio\Totem\Listeners\BustCacheImmediately       |
| Studio\Totem\Events\Updated                             |            Studio\Totem\Listeners\BustCache            |
|                                                         |           Studio\Totem\Listeners\BuildCache            |

## Register Event on App’s Service Provider

<!-- TODO: @pairote ขยายความ  -->

```php
php artisan make:event Installing
```

```php

namespace VenderName\ProjectName\Events;

    class Installing
    {
        use SerializesModels;

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function broadcastOn()
        {
            return [];
        }
    }
```

### Dispatching Events

To dispatch an event, you may pass an instance of the event to the event helper. you may call it from anywhere in your application:

```php
namespace VenderName\ProjectName\Http\Controllers\Admin;

    class AppsController extends Controller
    {
        protected function uninstall(UninstallRequest $request)
        {
            event(new Uninstalling($request));

            Apps::uninstall($request);

            event(new Uninstalled($request));

        }
    }
```

<!-- TODO: @pairote ขยายความ  -->

## Register Listener on App’s Event Service Provider

```php
/packages/vendor-name/project-name/
                    ├── src
                    │   ├── Listeners
                    │   │   ├── Uninstaling.php
                    │   │   ├── Uninstalled.php
                    │   │   |   ├── Blog.php
                    │   │   |   ├── page.php
```

### Listener

Set Listeners On App’s EventServiceProvider.php

```php
namespace VenderName\ProjectName;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

    class EventServiceProvider extends ServiceProvider
    {
        protected $listen = [
        \VenderName\ProjectName\Events\Uninstaling::class => [
        ],

        \VenderName\ProjectName\Events\Uninstalled::class => [
            \VenderName\ProjectName\Listeners\Uninstalled\Blog::class,
            \VenderName\ProjectName\Listeners\Uninstalled\Page::class,
        ],
    }
```

### Dispatching Listeners

Event listeners receive the event instance in their handle method. you may perform any actions necessary to respond to the event:

```php
namespace VenderName\ProjectName\Listeners\Uninstalled;

class Blog
{
    /*
     * event(new Uninstalled($request));
     */
    public function handle(Uninstalled $event)
    {
        $manageApp = ManageApp::withTrashed()
                                ->where('app_name', $event->request->appsName)
                                ->pluck('enabled_data')
                                ->first();

        $data = collect(json_decode($manageApp, true))->recursive();

        if ($data->get('post')->has('id')) {
            BlogPost::withTrashed()
                    ->whereIn('id', $data->get('post')->get('id')->toArray())
                    ->forceDelete();
        }
    }

```

### Rvsitebuilder Event

| Event                                                   |                                             |
| ------------------------------------------------------- | :-----------------------------------------: |
| Rvsitebuilder\Blog\Events\CreatingCategory              |         Bafore create blog category         |
| Rvsitebuilder\Blog\Events\CreatedCategory               |         After create blog category          |
| Rvsitebuilder\Blog\Events\CreatingPost                  |          Bafore created blog post           |
| Rvsitebuilder\Blog\Events\CreatedPost                   |           After created blog post           |
| Rvsitebuilder\Developer\Events\AfterSettingCreatedEvent |                                             |
| Rvsitebuilder\Manage\Events\Artisaning                  | Bafore publish vendor and rebuild appConfig |
| Rvsitebuilder\Manage\Events\Artisaned                   | After publish vendor and rebuild appConfig  |
| Rvsitebuilder\Manage\Events\Disabling                   |             Bafore disable app              |
| Rvsitebuilder\Manage\Events\Disabled                    |              After disable app              |
| Rvsitebuilder\Manage\Events\Enabling                    |              Bafore enable app              |
| Rvsitebuilder\Manage\Events\Enabled                     |              After enable app               |
| Rvsitebuilder\Manage\Events\Installing                  |             Bafore install app              |
| Rvsitebuilder\Manage\Events\Installed                   |              After install app              |
| Rvsitebuilder\Manage\Events\SiteConfig\BlogSaving       |     Bafore save in siteconfig menu blog     |
| Rvsitebuilder\Manage\Events\SiteConfig\BlogSaved        |     After save in siteconfig menu blog      |
| Rvsitebuilder\Manage\Events\SiteConfig\PageSaving       |     Bafore save in siteconfig menu page     |
| Rvsitebuilder\Manage\Events\SiteConfig\PageSaved        |     After save in siteconfig menu page      |
| Rvsitebuilder\Manage\Events\SiteConfig\PostSaving       |     Bafore save in siteconfig menu post     |
| Rvsitebuilder\Manage\Events\SiteConfig\PostSaved        |     After save in siteconfig menu post      |
| Rvsitebuilder\Manage\Events\SiteConfig\SiteSaving       |   Bafore save app in siteconfig menu site   |
| Rvsitebuilder\Manage\Events\SiteConfig\SiteSaved        |   After save app in siteconfig menu site    |
| Rvsitebuilder\Manage\Events\SiteConfig\SystemSaving     |    Bafore save in siteconfig menu system    |
| Rvsitebuilder\Manage\Events\SiteConfig\SystemSaved      |    After save in siteconfig menu system     |
| Rvsitebuilder\Manage\Events\Uninstalling                |            Bafore uninstall app             |
| Rvsitebuilder\Manage\Events\Uninstalled                 |             After uninstall app             |
| Rvsitebuilder\Wysiwyg\Events\ChainProcessSaving         |          Bafore save chain process          |
| Rvsitebuilder\Wysiwyg\Events\ChainProcessSaved          |          After save chain process           |
