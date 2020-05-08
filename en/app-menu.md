# App Menu

- [User menu](#user-menu)
  - [User menu to editable system page](#user-menu-to-editable-system-page)
  - [Submenu](#submenu)
- [Admin menu](#admin-menu)

## User menu

<!-- ### User menu to non-editable system page -->

### User menu to editable system page

```diff
/packages/vendor-name/project-name/
+                       ├── app.json

```

Add user menu in your app. You must be setting config file app.json

```php
   "user-menu": [
        {
            "name": "document",
            "link": "larecipe.index",
            "target": "_blank"
        }
    ],
```

link: link menu to page route name `larecipe.index`

### Submenu

```php
        menu google
                ├── facebook
                │   │   ├── twitter
```

```diff
   "user-menu": [
        {
             "name": "google",
             "link": "http://google.com",
             "target": "_blank",
+            "submenu": [
                {
                     "name": "facebook",
                     "link": "http://facebook.com",
                     "target": "_blank",
+                    "submenu": [
                        {
                            "name": "twitter",
                            "link": "http://twitter.com",
                            "target": "_blank"
                        }
                    ]
                }
            ]
        }
    ],
```

link: link menu to external menu url.

To prevent error appears on the website, disabling or uninstalling app on the Manage. RVsitebuilder will automatically hide your app's menu, disable all app’s routes and shows 404 error page.

## Admin menu

Open app.json file in your app and setting config "admin-menu". You must create a "your-file.blade.php" file inside 'resources/views/your-file.blade.php' and create a route name to a blade file using the link.

```php

    "admin-menu":[
        {
            "name":"My app menu",
            "link":"your.route.name"
        }
    ],

```
