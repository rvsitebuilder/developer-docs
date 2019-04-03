# App DB Migration and Model

> {info} If you are not familiar with its concept. Check out the full [Laravel Migration documentation](https://laravel.com/docs/master/migrations) to get started. 

## Creating Migration

Create Laravel migration file and keep it in your `app’s /database/migrations` folder. 

```
/packages/author/appname/
                    ├── database
                    │   └── migrations
                    │       └── 2019_03_14_074812_regist_app_to_core_app.php
```

To avoid as much as possible troubles, you migration should:
 - Database table should have a prefix.
 - Creating schema should wrap with the `Schema::hasTable` or `Schema::hasColumn`.

```php
        if (!Schema::hasTable('app_table')) {
            Schema::create('app_table', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('app_table', 'title')) {
            Schema::table('app_table', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->text('title')->nullable()->after('id');
            });
        }
```

## Registering App on App table 

This is mandatory.
// TODO: @pam default master system page?

```php
<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Rvsitebuilder\Manage\Models\CoreApps;

class RegistNewAppToCoreApp extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Model::unguard();
        $this->seed();
        Model::reguard();
    }

    private function seed()
    {
        CoreApps::firstOrCreate(['app_name' => 'author/appname']);
    }
}
```

## Define Migration on App's Service Provider

When installing your app, we run `artisan migrate` to make a change on the database according to your migration file defined on the service provider.

```php
public function boot() { 
    $this->defineMigration()
} 

public function defineMigration(){
    $this-> loadMigrationsFrom(__DIR__.'/path/to/migrations'); 
} 
```

Keep in mind that Migration file run only once and by its order, usually by datetime appears on the migration filename. If you want to change DB schema for the existing users, you need to create a new migration file. Make any changes on the old one will not be affect existing users. 

