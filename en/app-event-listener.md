# App Event and Listener

> {info} If you are not familiar with its concept. Check out the full [Laravel Events documentation](https://laravel.com/docs/master/events) to get started.

- [Creating Event and Listener](#creating-event-and-listener)
- [Eloquent Model Events](#eloquent-model-events)
- [RVsitebuilder Application Events](#rvsitebuilder-application-events)
- [Register Event on App’s Service Provider](#register-event-on-apps-service-provider)
  - [Dispatching Events](#dispatching-events)
- [Register Listener on App’s Event Service Provider](#register-listener-on-apps-event-service-provider)
  - [Listener](#listener)
  - [Dispatching Listeners](#dispatching-listeners)

<a name="Creating-Event-and-Listener"></a>

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

<a name="Eloquent-Model-Events"></a>

## Eloquent Model Events

Eloquent models fire several events **automatically**, allowing you to hook into the following points in a model's lifecycle: retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored.

> {info} Check out the [Laravel Eloquent Events documentation](https://laravel.com/docs/master/eloquent#events) to get started.

<a name="RVsitebuilder-Application-Events"></a>

## RVsitebuilder Application Events

<!-- TODO: @apiruk ตรวจสอบว่าทำไม แสดงผลไม่ครบ ของ framework และ ของ เรา ไม่แสดงผล-->

You can find the full list of events using Artisan command.

```php
php artisan event:list
```

<!-- TODO: @apiruk ต้องปรับปรุงแก้ไขหัวข้อ manage hook https://app.clickup.com/t/t523b  และ เขียน document ให้ถูกด้วยครับ -->

![meta](images/php_artisan_event_list.png)

<a name="Register-Event-on-App-Service-Provider"></a>

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

<a name="Register-Listener-on-App-Service-Provider"></a>

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
