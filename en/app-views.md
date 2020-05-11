# App Views

- [Creating View](#creating-view)
- [Master Layouts](#master-layouts)
- [Admin App Layouts](#admin-app-layouts)
- [User App Layouts](#user-app-layouts)
- [App Views](#app-views)
- [Creating Non-Editable System Page](#creating-non-editable-system-page)
- [Creating Editable System Page](#creating-editable-system-page)

> {info} If you are not familiar with its concept. Check out the full [Laravel View documentation](https://laravel.com/docs/5.8/views) to get started.

## Creating View

Create Laravel blade file and keep it in your `app’s /resources/views` folder.

```php
/packages/vendor-name/project-name/
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

## Master Layouts

There are 4 master layouts available on RVsitebuilder. All master layouts load necessary JavaScript and CSS according to the template end-user choosing on the admin area.

- `admin.layouts.master` - admin pages that include top bar, app launcher, and your app's left menu.
- `admin.layouts.master-blank` - admin blank pages. It is useful for creating pop-up or iframe.
- `user.layouts.master` - user pages that include header, menu, sidebar, footer, and etc.
- `user.layouts.master-blank` - user blank pages. It is useful for creating pop-up or iframe.

To make your app user interface consistency throughout the site. You should extend master layouts on your `app's layouts` folder.

## Admin App Layouts

Here is an example of `views/admin/layouts/app.blade.php`:

```php
@extends('admin.layouts.master')

@section('leftmenu')
	@include('admin.includes.leftmenu', ['project_name' => "vendor-name/project-name"])
@endsection

@push('package-styles')
<!-- package-styles -->

@endpush

@push('package-scripts')
<!-- package-scripts -->

@endpush
```

**Admin Left Menu**

`leftmenu` section should includes default `admin.includes.leftmenu` and send your correct vendor-name and project-name `vendor-name/project-name`. It will dynamically generate menu according to your [app's app.json](app-configuration-app-json.md).

keeping in mind that, end-users can move your left menu to display on the other app, change your app’s display name, and hide icon on app launcher.

**Package-style Blade Stack**

Insert your CSS scripts for admin pages here.

**Package-script Blade Stack**

Insert your JavaScript for user pages here.

## User App Layouts

Here is an example of `views/user/layouts/app.blade.php`.

```php
@extends('user.layouts.master')

@push('package-styles')
<!-- package-styles -->

@endpush

@push('package-scripts')
<!-- package-scripts -->

@endpush
```

## App Views

All your views should extend your `app's layouts`. And add your content in `content` blade section.

```php
@extends('vendor-name/project-name::admin.layouts.app')

@section('content')
    Your app content here.
@endsection
```

You can `@push('package-styles')` and `@push('package-scripts')` if you have anything specific only for this view.

## Creating Non-Editable System Page

Standard Laravel routes and views are [non-editable system pages](page-type.md). This give you a freedom to do whatever you want while perfectly display under the same theme as other pages. Its drawback is the end-user cannot modify the page properties such as SEO options, META tags, and etc.

You may explicitly set web page title on your blade view.

```php
@section('title','Your page website title'))
```

End-user still see all your `app's route` on the system page hyperlink selection list. To hide it from the hyperlink selection list, you need to add `hideFromHyperlinkList` on your `app’s service provider`.

```php
public function boot()
{
    $this->defineHideFromHyperlinkList()
}

public function defineHideFromHyperlinkList()
{
    $routes =   [
                    'totem/tasks',
                    'totem/tasks/create'
                ];

    app('rvsitebuilderService')->hideFromHyperlinkList($routes);
}
```

## Creating Editable System Page

To make your system page editable, you need to do the following:

1. Migration
2. Creating route for WYSIWYG editview
3. Push wysiwyg-section blade stack

> {info} Checkout [Creating Editable System Page Documentation](creating-editable-system-page.md) for more detail.
