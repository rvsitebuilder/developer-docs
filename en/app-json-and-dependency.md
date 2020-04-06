# App Information

- [App.json Schema](#appjson-schema)
- [Properties](#properties)
- [RVsitebuilder App Dependency](#rvsitebuilder-app-dependency)

## App.json Schema

We use properties information on your `app.json` to display app information and default value of the app. We have a JSON schema that documents all properties and their format to use your app.json. You can find it at: https://dev.rvsitebuilder.com/schema.json.

<!-- TODO: @Settavut create the full list of schema.json above and make above URL accessible. And explain it below similar to https://getcomposer.org/doc/04-schema.md -->

## Properties

**name**
: The name of the project. It consists of vendor name and project name, separated by /. Examples:

- `netway/instagram`
- `armnet/telescope`

The name must be lowercase alphanumeric characters without spaces.

**alias**

: App display name on the end-user website.

> {info} User can overwrite the value on the app management page.

**description**

A short description of the project. Usually this is one line long.

**admin-menu**

```json
"admin-menu": [{
    "name": "Marketing Dashboard",
    "link": "admin.marketing.mkt.index"
    },{
    "name": "Acquisition",
    "link": "",
    "submenu": [{
        "name": "SEO",
        "link": "admin.marketing.mkt.seo",
        "id": "mktseo"
    }, {
        "name": "Web Referral",
        "link": "admin.marketing.mkt.webreferral",
        "id": "mktwebreferral"
    }]
}]
```

**submenu**
In case if you want more one level you can add this object , Its be second level of submenu. If you create submenu object the link of submenu have to null.

**_name_**
The name of submenu

**_link_**
Route to page (laravel route name)

**_id_**
The id of submenu

Example:

```json
"submenu": [{
    "name": "Marketing Dashboard",
    "link": "admin.marketing.mkt.index"
}]
```

**user-menu**

```text
        ├── YourMenu
        ├── google
        │   ├── facebook
        │       ├── twitter
```

```json
     "user-menu": [
        {
            "name": "YourMenu",
            "link": "yourroutename.index", // your route name
            "target": "_blank"
        },
        {
            "name": "google",
            "link": "http://google.com", // External link
            "target": "_blank",
            "submenu": [
                {
                    "name": "facebook",
                    "link": "http://facebook.com",
                    "target": "_blank",
                    "submenu": [
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

**page**

```json
    "page": [
        {
            "name": "my-page",
            "content": "template/mypage.blade.php", // vendor-name/project-name/resources/view/template/mypage.blade.php
            "meta-title": "my-page",
            "embed-meta": "",
            "embed-js": "",
            "embed-css": "",
            "seo": ""
        },
    ],
```

**system-page**

```diff
        ├── Member
        │   ├── my system page 01
        ├── Blog
+       ├── Your-App-Name
+       │   ├── my system page 01

```

```json
       "system-page": [
        {
            "name": "my system page 01",
            "content": "template/system.blade.php", // vendor-name/project-name/resources/view/template/system.blade.php
            "meta-title": "",
            "embed-meta": "",
            "embed-js": "",
            "embed-css": ""
        }
    ],
```

**Category**

```php
        ├── General
        ├── level 0-1
        │   ├── level 1-1
        │   ├── level 1-2
        │       ├── level 2-1
        │           ├── level 3-1
        │           ├── level 3-2
        │
        ├── level 0-2
```

```json
  "category": [
        {
            "name": "level 0-1",
            "content": "",
            "subcategory": [
                {
                    "name": "level 1-1",
                    "content": ""
                },
                {
                    "name": "level 1-2",
                    "content": "",
                    "subcategory": [
                        {
                            "name": "level 2-1",
                            "content": "",
                            "subcategory": [
                                {
                                    "name": "level 3-1",
                                    "content": ""
                                },
                                {
                                    "name": "level 3-2",
                                    "content": ""
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        {
            "name": "level 0-2",
            "content": ""
        }
    ],
```

**post**

```diff
        ├── General
        ├── level 0-1
        │   ├── level 1-1
+       │   │   ├── exp-post-02
        ├── level 0-2
+       │   ├── exp-post-01
```

```json
    "post": [
        {
            "name": "exp-post-01",
            "content": "",
            "category": "level 0-2",
            "html-title": "",
            "embed-meta": "",
            "embed-js": "",
            "embed-css": ""
        },
        {
            "name": "exp-post-02",
            "content": "",
            "category": "level 1-1",
            "html-title": "",
            "embed-meta": "",
            "embed-js": "",
            "embed-css": ""
        }
    ],
```

**master-system-page**

```json
    "master-system-page": [
            {
            "name": "larecipe master system page"
            }
    ]
```

## RVsitebuilder App Dependency

You may want to extend other RVsitebuilder app or use it together with your app. It is very easy. All apps dependency will be installed while installing app on the production web site.

Here is an example of `app’s app.json`:

```json
    "require": {
            "rvsitebuilder\/marketing": "^0.1.0"
        },
```

```json
    "require-dev": {
        "rvsitebuilder\/queuesharedhost": "^0.1.0"
    },
```

Its version constraint follow the same system as composer version constraint. You can find RVsitebuilder apps at [RVsitebuilder Marketplace](https://apps.rvsitebuilder.com). Enjoys!
