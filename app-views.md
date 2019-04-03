# App Views

> {info} If you are not familiar with its concept. Check out the full [Laravel View documentation](https://laravel.com/docs/master/views) to get started. 

## Creating View

Create Laravel blade file and keep it in your `app’s /resources/views` folder. 
```
/packages/author/appname/
                    ├── resources
                    │   └── views
                    │       ├── admin
                    │       │   ├── dashboard
                    │       │   │   └── index.blade.php
                    │       │   └── layouts
                    │       │        └── app.blade.php
                    │       └── user
                    │           ├── dashboard
                    │           │   └── index.blade.php
                    │           └── layouts
                    │               └── app.blade.php
```

## Master Layout 

There are 4 master layouts available. 
- `admin.layouts.master` 
- `admin.layouts.master-blank`
- `user.layouts.master`
- `user.layouts.master-blank`

## App Layout 
To make your app user interface consistency throughout the site. You should extend master layout on your app's layout. 

Here is an example of `views/admin/layouts/app.blade.php`:
```php
@extends('admin.layouts.master')

@section('leftmenu')
	@include('admin.includes.leftmenu', ['package_name' => "author/appname"])
@endsection

@push('package-styles')
<!-- package-styles -->

@endpush

@push('package-scripts')
<!-- package-scripts -->
    
@endpush
```

**Package-script Blade Stack** 
Insert your JavaScript here.

**Package-style Blade Stack**
Insert your CSS script here.


## App View

All your view should extend your app's layout. And add your content in `content` blade section.

```php
@extends('appname::admin.layouts.app')

@section('content')
    Your app content here.
@endsection
```

## Non-editable system page 

If you have no plan to allow end-user to update your app’s system page, just create standard Laravel route and view. All admin pages are non-editable system page.  

User pages could be editable or non-editable page. End-user still see its route on the system page hyperlink selection list. 

To hide it from the hyperlink selection list, you need to `defineHideFromHyperlinkList` on your app’s service provider. 
//TODO: @pam defineHideFromHyperlinkList

```php
public function boot() { 
    $this->defineHideFromHyperlinkList()  
} 

public function defineHideFromHyperlinkList (){ 
    
}
``` 

## Editable system page 

Editable system page is the page that be able to edit on WYSIWYG. To make it more dynamic, and configurable. it will be rendered through RVsitebuilder `widget` system. 
 
You need to seed your app’s editable system page to `SYSTEM_PAGE` table. You can define which system page ID is your master system page.  

Migration example: 
```php
Xxx 

Xxxx 
``` 
 

## Routing for editable system page 

editmode 

 