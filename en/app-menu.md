# App Menu

-   [User menu](#user-menu)
    -   [User menu to editable system page](#user-menu-to-editable-system-page)
-   [Admin menu](#admin-menu)

## User menu

<!-- ### User menu to non-editable system page -->

### User menu to editable system page

Add user menu migration example:

```php
CoreMenu::updateOrCreate(
    [
        'menu_title' => 'page-name'
    ],[
        'slug_id' => 1, // id from core_slug table.
        'menu_title' => 'page-name',
        'fontawesome' => 'uk-icon-home',
        'badge_title' => '',
        'badge_style' => '',
        'parent_id' => 0,
        'menu_type' => 1, // 1 page , 2 post , 3 system, 4 external.
        'external_url' => '',
        'priority' => 1,
        'location' => 1, // 1 left , 2 right , 3 top.
        'target' => '_self',
    ]
);
```

To prevent error appears on the website, disabling or uninstalling app on the Manage. RVsitebuilder will automatically hide your app's menu, disable all app’s routes and shows 404 error page.

## Admin menu

Open app.json file in your app and setting config "admin-menu". You must create a "your-file.blade.php" file inside 'resources/views/your-file.blade.php' and create a route name to a blade file using the link.

```php

    "admin-menu":[{ "name":"My app menu", "link":"your.route.name"}],

```
