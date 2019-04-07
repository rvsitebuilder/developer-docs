# Creating Editable System Page


To make your system page editable, you need to do the following:

1. Migration
2. Creating route for WYSIWYG editview
3. Push wysiwyg-section blade stack


##  Migration

You need to seed your app’s editable system page to `core_system_page` database table. 

// TODO: @pam example here. It is very long
Migration example: 
```php
Page
slug
seo
``` 

### Master System Page
You can define which system page ID is your master system page.  
// TODO: @pam default master system page?


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


## Creating route for editview

editmode 






 



