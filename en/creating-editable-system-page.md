# Creating Editable System Page

- [System page blade file](#system-page-blade-file)
  - [wysiwyg-section blade stack](#wysiwyg-section-blade-stack)
  - [Control layout editor tools](#control-layout-editor-tools)
- [Creating route for editview](#creating-route-for-editview)

To make your system page editable, you need to do the following:

Config in your app file app.json

```diff
/packages/vendor-name/project-name/
+                       ├── app.json

```

```php
    "system-page": [
        {
            "name": "system page 01",
            "content": "template/system.blade.php", // default ""
            "meta-title": "",
            "embed-meta": "",
            "embed-js": "",
            "embed-css": ""
        }
    ],
```

## System page blade file

You can create blade file in folder `view/template` and code something on file.

```diff
/packages/vendor-name/project-name/
                        ├── resources
                        │   ├── views
                        │   │   ├── template
+                       │   │   │    ├── system.blade.php

```

### wysiwyg-section blade stack

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

### Control layout editor tools

You can control layout editor tools in section and block with a `<div class="mg">...</div>` element.you need to do the following:

**`Delete`** you can add class `donotdelete` for **hide** Delete Button in section and block.

**`Duplicate`** you can add class `mgwidget` for **hide** Duplicate Button in section and block.

## Creating route for editview

editmode

<!-- TODO:: RVsitebuilder 7.4 -->

<!-- ## Section Layout Template -->

<!-- ### Generic layout (compatible for all CSS framework) -->

<!-- ### UIKit3 layout -->

<!-- ### Bootstrap4 layout -->
