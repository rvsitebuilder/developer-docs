# Creating Editable System Page

- [Migration](#migration)
  - [Master System Page](#master-system-page)
- [Push wysiwyg-section blade stack](#push-wysiwyg-section-blade-stack)
- [Creating route for editview](#creating-route-for-editview)

To make your system page editable, you need to do the following:

1. Migration
2. Creating route for WYSIWYG editview
3. Push wysiwyg-section blade stack

<a name="Migration"></a>

## Migration

You need to seed your app’s editable system page to `core_system_page` database table.

```php
CoreSystemPage::updateOrCreate(
        [
            'page_name' => 'master-page-name',
        ],[
            'header_id' => 2, // Id core_header ,2 = non header.
            'sidebar_id' => 0, // Id core_sidebar , 0 = use sidebar with parent page.
            'footer_id' => 0, // Id core_footer , 0 = use footer with parent page.
            'content_view' => SystemPageLib::defMasterSystemContentView(),
            'content_edit' => SystemPageLib::defMasterSystemContentEdit(),
            'embed_meta' => '',
            'embed_js' => '',
            'embed_css' => '',
            'is_published' => 0, // 0 = Show in your site , 1 = Your site doesn't show.
            'user_id' => 1,
            'visibility_id' => 1, // Id core_visibility
            'page_name' => 'master-page-name',
            'role_id' => 1,
            'app_id' => 1,  // Id core_apps
            'published_at' => date('Y-m-d H:i:s'),
        ]
);
```

> {info} If your master-page-name id = 12 in core_system_page table.

```php
CoreSlug::updateOrCreate(
    [
            'slug_name' => 'master-page-name'
    ],[
            'slugble_id' => 12, // Id core_system_page
            'slugble_type' => config('core.model.system'),
            'slug_prefix' => 'rvsitebuilder/core', // Your vendor-name/project-name
            'slug_name' => 'master-page-name',
    ]
);

```

```php
CoreSeo::updateOrCreate(
        [
            'meta_title_auto' => 'core-app-master'
        ],[
            'seoble_id' => 12, // Id core_system_page
            'seoble_type' => config('core.model.system'),
            'meta_title_auto' => 'core-app-master',
            'focus_keywords_auto' => 'This is description app-master in RVsitebuilder CMS',
            'meta_des_auto' => 'This is description app-master in RVsitebuilder CMS',
            'use_type' => 1,
        ]
);
```

```php
CoreFacebook::updateOrCreate(
        [
            'fb_title_auto' => 'core-app-master'
        ],[
            'fbble_id' => 12, // Id core_system_page
            'fbble_type' => config('core.model.system'),
            'fb_title_auto' => 'core-app-master ',
            'fb_des_auto' => 'This is description app-master in RVsitebuilder CMS',
            'fb_type' => 'website',
            'featured_image' => config('rvsitebuildercms.cdn').'/templates/rvs_library/imageslibrary_v6/mrv_300x360/    otherimage/L/solidstockart-stock-photo-an-image-of-a-nice-autumn-la-568050.jpg',
            'fb_site_name' => 'Rvglobal soft',
            'use_type' => 1,
        ]
);
```

```php
CoreTwitter::updateOrCreate([
            'twit_title_auto' => 'core-app-master'
        ],[
            'twitble_id' => 12, // Id core_system_page
            'twitble_type' => config('core.model.system'),
            'twit_title_auto' => 'core-app-master',
            'twit_des_auto' => 'This is description app-master in RVsitebuilder CMS',
            'twit_site' => 'website',
            'twit_creator' => 'Rvglobal soft',
            'featured_image' => config('rvsitebuildercms.cdn').'/templates/rvs_library/imageslibrary_v6/mrv_300x360/otherimage/L/solidstockart-stock-photo-an-image-of-a-nice-autumn-la-568050.jpg',
            'use_type' => 1,
        ]
);
```

### Master System Page

You can define which system page ID is your master system page.

```php
CoreApps::where('app_name', '=', 'rvsitebuilder/core') // vendor-name/project-name
        ->update(['master_systempage_id' => 12 ]); // Id core_system_page
```

<a name="Push-wysiwyg-section-blade-stack"></a>

## Push wysiwyg-section blade stack

Add the following code at the bottom of your editable system page's blade file.

```php
@push('wysiwyg-section')
    @if ($editmode)
        @include('wysiwyg::user.layouts.section')
    @endif
@endpush
```

**wysiwyg-section Blade Stack**

Only `editable system page` is required. If your user page is not visually editable on admin WYSIWYG, you don't need it.

<a name="Creating-route-for-editview"></a>

## Creating route for editview

editmode
