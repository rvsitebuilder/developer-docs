# App Model

  - [Creating Model](#Creating-Model)
  - [Accessing Model](#Accessing-Model)
  - [Extending RVsitebuilder Default Models](#Extending-RVsitebuilder-Default-Models)


> {info} If you are not familiar with its concept. Check out the full [Laravel Eloquent ORM documentation](https://laravel.com/docs/master/eloquent) to get started. 

<a name="Creating-Model"></a>
## Creating Model

Create Laravel model file and keep it in your `app’s /src/Models` folder. 

```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Models
                    │   │   └── MyTable.php
```

```php
namespace VendorName\PackageName\Models;
  
class MyTable extends BaseModel
{
    public $timestamps = true;
    protected $table = 'my_table';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    
}

```
<a name="Accessing-Model"></a>
## Accessing Model

Use your model namespace on your app and execute any Laravel Eloquent ORM syntax as usual.

```php
use Vendor-name\Package-name\Models\MyTable;

```

<a name="Extending-RVsitebuilder-Default-Models"></a>
## Extending RVsitebuilder Default Models using Meta Table

Ever want to add more data to `Users` table. Thanks to wonderful [Laravel-Metable](https://github.com/plank/laravel-metable) package to make it possible. You can extend RVsitebuilder default model without needing to adjust the database schema.

<!-- TODO: @settavut ขยายความต่อ -->
The following model are `metable`. 
 * Users
 * Page
 * Post
 * System page
 * ....





