# App Menu
  - [User menu](#User-menu)
  - [Admin menu](#Admin-menu) 

<a name="User-menu"></a>
## User menu
 <!-- Todo @pram -->

 ### User menu to non-editable system page


 ### User menu to editable system page

Add user menu migration example: 
```php
CoreMenu::updateOrCreate(
    [
        'menu_title' => 'Home'
    ],[
        'slug_id' => 1, // id from core_slug table
        'menu_title' => 'Home',
        'fontawesome' => 'uk-icon-home',
        'badge_title' => '',
        'badge_style' => '',
        'parent_id' => 0,
        'menu_type' => 1,
        'external_url' => '',
        'priority' => 1,
        'location' => 1,
        'target' => '_self',
    ]
);
```
To prevent error appears on the website, disabling or uninstalling app on the Manage.  RVsitebuilder will automatically hide your app's menu, disable all app’s routes and shows 404 error page.  


<a name="Admin-menu"></a>
## Admin menu

 <!-- Todo @jan -->