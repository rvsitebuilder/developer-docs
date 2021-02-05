# Page Types

- [Page](#page)
- [Post](#post)
- [Post Category](#post-category)
- [System Page](#system-page)
  - [Non-editable system page](#non-editable-system-page)
  - [Editable system page](#editable-system-page)
- [Product](#product)
- [Product Category](#product-category)
- [Pop-up](#pop-up)
- [Splash Page](#splash-page)
- [Create Prefix](#create-prefix)

## Page

Page is a web page created dynamically by the end-user from RVsitebuilder CMS. It can be a parent menu, sub-menu, and internal page. Internal page is the page that not exist on the menu but could be link to.

## Post

Blog post is created dynamically by the end-user. It is organized under post categories.

## Post Category

Post can be listed on several post categories, but need to have a primary category. Post listing will list the post on the primary category.

## System Page

System page is the page that created by app developers and **cannot** remove by end-users.

### Non-editable system page

Non-editable system page is the page that render directly from blade engine and **cannot** be edited on WYSIWYG including page properties such as Slug URL, SEO options, META tags, and etc.

End-users may link to it on the system page hyperlink's selection list.

### Editable system page

Editable system page is the page that render from database and **can** edit on WYSIWYG including page properties such as SEO options, META tags, and etc. Slug URL cannot be modified though.

To display visually and configurable, system page may contain RVsitebuilder widget to make it happens.

## Product

Coming soon

## Product Category

Coming soon

## Pop-up

Coming soon

## Splash Page

Coming soon

## Create Prefix

If you need to create the prefix you can use the method `setPrefix`. You may register prefix in the app.json.
For example: You can set dynamic prefix. When defining dynamic you need to use %% only.

*** Rule
    1. The prefix is unique.
    2. 1 prefix per model.

```php
    "prefix": [
        {   
            "Shop\\Book\\Models\\Product": "category/%CATEGORY_NAME%/",
            "Shop\\Book\\Models\\Order": "product/order"
        }
    ],
```

For example,If you want your get prefix you can use the `getPrefixFromModel`
and send your model.

```php
    use Rvsitebuilder\Manage\Lib\Apps;

    Apps::getPrefixFromModel(Product::class);
```

For example,If you want your update prefix you can use the `setPrefixByModel`
, send parameter model and new value prefix into method.

```php
    use Rvsitebuilder\Manage\Lib\Apps;

    Apps::setPrefixByModel(Product::class , 'newPrefix');
```
