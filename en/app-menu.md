# App Menu
  - [User menu](#User-menu)
  - [Admin menu](#Admin-menu) 

<a name="User-menu"></a>
## User menu
  
### User menu to non-editable system page
<!-- TODO: @pairote menu to non-editable ไม่สามารถทำได้ --> 
 
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
To prevent error appears on the website, disabling or uninstalling app on the Manage.  RVsitebuilder will automatically hide your app's menu, disable all app’s routes and shows 404 error page.  


<a name="Admin-menu"></a>
## Admin menu


 