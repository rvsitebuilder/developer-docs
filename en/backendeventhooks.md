<!-- TODO: @pram Backend Event Hooks -->

# Backend Event Hooks

- [SiteSaving event](#sitesaving-event)
- [SiteSaved event](#sitesaved-event)
- [Event in Controller](#event-in-controller)
- [SiteSaved Listeners](#sitesaved-listeners)
  - [Example create new listeners.](#example-create-new-listeners)

![Inject to Toolbar](images/site_config.png)

## SiteSaving event

```php
namespace Rvsitebuilder\Manage\Events\SiteConfig;

    class SiteSaving
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

## SiteSaved event

```php
namespace Rvsitebuilder\Manage\Events\SiteConfig;

    class SiteSaved
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

## Event in Controller

```php

namespace Rvsitebuilder\Manage\Http\Controllers\Admin;

    class AppsConfigController extends Controller
    {
        public function store(AppsConfigRequest $request)
        {
            +----------------------------------+
            | event(new SiteSaving($request)); |
            +----------------------------------+

            $newRequest = CustomValidate::customRequestKey($request->all());

            $appName = $newRequest['appName'];

            foreach ($newRequest as $keyName => $val) {
                if (empty($val)) {
                    continue;
                }
                if ($keyName != 'appName') {
                    CoreSetting::updateOrCreate(
                        ['key' => $appName.'.'.$keyName],
                        ['key' => $appName.'.'.$keyName, 'value' => $val]);
                }
            }

            +----------------------------------+
            | event(new SiteSaved($request));  |
            +----------------------------------+

            return response()->json(['message' => __('rvsitebuilder/manage::main.save.success')]);
        }
    }

```

## SiteSaved Listeners

You can create is a new listeners and coding something you want in to listeners.

```php

namespace Rvsitebuilder\Manage\Listeners;

    class CachingProcess
    {
        public function handle(SiteSaved $event)
        {
            if (isset($event->request->appName) && $event->request->appName == 'rvsitebuilder/manage') {

                // $event->request->route_cache_enabled come from HTML form and always string.
                if ($event->request->route_cache_enabled == 'true') {
                    Config::set('rvsitebuilder/manage.route_cache_enabled', true);
                    ServiceCache::guzzleRebuildRoute();
                } else {
                    ServiceCache::clearRoute();
                }

                // $event->request->route_cache_enabled come from HTML form and always string.
                if ($event->request->view_cache_enabled == 'true') {
                    Config::set('rvsitebuilder/manage.view_cache_enabled', true);
                    ServiceCache::guzzleRebuildView();
                } else {
                    ServiceCache::clearView();
                }
            }
        }
    }
```

### Example create new listeners.

Step 1. Create and open EventServiceProvider.php file.

```php

php artisan event:generate

```

```php

namespace YourVendor\YourProject;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

    class EventServiceProvider extends ServiceProvider
    {
        protected $listen = [
            \Rvsitebuilder\Manage\Events\SiteConfig\SiteSaving::class => [
+                \YourVendor\YourProject\Listeners\YourProcess::class,
            ],

            \Rvsitebuilder\Manage\Events\SiteConfig\SiteSaved::class => [
+                \YourVendor\YourProject\Listeners\YourProcess::class,
            ],
    }

```

Step 2. Coding something in to your listeners.

```php

namespace YourVendor\YourProject\Listeners;

    class YourProcess
    {
        public function handle(SiteSaved $event)
        {
            if (isset($event->request->appName) && $event->request->appName == 'rvsitebuilder/manage') {
                // coding something
            }
        }

```
