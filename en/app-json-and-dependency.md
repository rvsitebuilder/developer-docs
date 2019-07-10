# App Information
  - [App.json](#App-json)
  - [Properties](#Properties) 
  - [RVsitebuilder App Dependency](#RVsitebuilder-App-Dependency)
  
<a name="App-json"></a>
## App.json

We use properties information on your `app.json` to display app information and default value of the app. We have a JSON schema that documents all properties and their format to use your app.json. You can find it at: https://dev.rvsitebuilder.com/schema.json.

<!-- TODO: @Settavut create the full list of schema.json above and make it accessible. and explain it below similar to https://getcomposer.org/doc/04-schema -->

<a name="Properties"></a>
## Properties

name
:  The name of the package. It consists of vendor name and project name, separated by /. Examples: 

- `netway/instagram` 
- `armnet/telescope`

The name must be lowercase alphanumeric characters without spaces. 

**alias**

: App display name on the end-user website.

> {info} User can overwrite the value on the app management page. 

**description**

A short description of the package. Usually this is one line long. 

**Submenu**

***name***
The name of submenu 

***link***
 Route to page (laravel route)  

***id***
The id of submenu  

Example:
```json
"submenu": [{
    "name": "Marketing Dashboard",
    "link": "admin.marketing.mkt.index"
}]
```

**submenulv2**
In case if you want more one level you can add this object , Its be second level of submenu. If you create submenulv2 object the link of submenu have to null.

Example:
```json
"submenu": [{
    "name": "Marketing Dashboard",
    "link": "admin.marketing.mkt.index"
    },{
        "name": "Acquisition",
        "link": "",
        "submenulv2": [{
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
 
<a name="RVsitebuilder-App-Dependency"></a>
## RVsitebuilder App Dependency

You may want to extend other RVsitebuilder app or use it together with your app. It is very easy. All apps dependency will be installed while installing app on the production web site. 

Here is an example of `app’s app.json`:

```json
"requires": {
        "rvsitebuilder\/marketing": "^0.1.0"
    },
```

Its version constraint follow the same system as composer version constraint. You can find RVsitebuilder apps at [RVsitebuilder Marketplace](https://apps.rvsitebuilder.com). Enjoys! 