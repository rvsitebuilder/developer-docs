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
- [Create new page type](#create-new-page-type)
- [Using relationship to CoreSlug model](#using-relationship-to-coreslug-model)
- [Retrieving The Relationship](#retrieving-the-relationship)

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

## Create new page type

- If you have a model table and want to create a page type by yourself. You can following this step instructions will help you.

    Table structure example.
    The model CoreSlug from Core app and model Product from Shop app.

```diff
    ── core_slug 
            |1
            |   One To One (Polymorphic)
            |1
+   ── product
```

```diff
     ├── Rvsitebuilder  
     │   └── Core
     │        └── Models
+    │           └── CoreSlug
     │           └── CorePrefix
    
```

Model CoreSlug

```php
    Class Rvsitebuilder\Core\Models\CoreSlug;
```  

```diff
    ├── Shop  
    │   └── Book
    │        └── Models
+   │           └── Product
```

Model Product.

```php
    Class Shop\Book\Models\Product;
```

When you created a product and you must created data into core_slug table too.You can call this method `setSlug`.The argument's value by you set is passed to the function parameter.

```php
    use Rvsitebuilder\Core\Models\CoreSlug;
    use Shop\Book\Models\Product;


        $newItem = Product::create([
                        'product_name' => 'PHP',
                        'price'  => '30' ,
                        'detail' => 'PHP is the ultimate learning guide.',
                    ]); 
        $slug = CoreSlug::setSlug($newItem, $newItem->product_name);
```

If you want to create the prefix you can call this method `setPrefix`.

```php
    use Rvsitebuilder\Core\Models\CorePrefix;
    use Rvsitebuilder\Core\Models\CoreSlug;
    use Shop\Book\Models\Product;
 
        $prefix = 'category/books';
        $newItem = Product::create([
                        'product_name' => 'PHP',
                        'price'  => '30' ,
                        'detail' => 'PHP is the ultimate learning guide.',
                    ]);
 
        $slug = CoreSlug::setSlug($newItem, $newItem->product_name);
        $prefix = CorePrefix::setPrefix($slug, $prefix);
```

</br>

- Step 1 Create new product data and make sure you create the product is done.

    |  id   | name  | description                         | price |
    | :---: | :---: | :---------------------------------- | ----: |
    |   1   |  PHP  | PHP is the ultimate learning guide. |   $30 |

</br>

- Step 2 After you call the method `CoreSlug::setSlug` , You can create the new page type is done.

    |  id   | slugble_id |            slugble_type            | slug_name |
    | :---: | :--------: | :--------------------------------: | :-------: |
    |   1   |     1      | Rvsitebuilder\Core\Models\CorePage |   home    |
    |   2   |     1      |      Shop\Book\Models\Product      |    php    |

</br>

- Step 3 After you call the method `CorePrefix::setPrefix` , You can create the new prefix is done.

    |  id   | slug_id |  prefix_name   |
    | :---: | :-----: | :------------: |
    |   1   |    2    | category/books |

## Using relationship to CoreSlug model

Next, let's examine the model definitions needed to build this relationship. Typically,you should configure dynamic relationships within the boot method of a `ServiceProvider` :

```php
    use Rvsitebuilder\Core\Models\CoreSlug;
    use Shop\Book\Models\Product;

    public function boot(): void
    {
        Product::resolveRelationUsing('getSlug', function ($model) {
            return $model->morphOne(CoreSlug::class, 'slugble');
        }); 
    }
```

## Retrieving The Relationship

For example, to retrieve the slug for a product, we can access the slug dynamic relationship property:

```php
    use Shop\Book\Models\Product;

        $product = Product::find(1); 
        $slug = $product->getSlug;
```

For example, to retrieve the prefix for a product, we can access the slug dynamic relationship property:

```php
    use Shop\Book\Models\Product;

        $product = Product::find(1); 
        $slug = $product->getSlug->getPrefix;
```
