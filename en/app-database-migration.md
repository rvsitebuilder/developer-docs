# App DB Migration

-   [Creating Migration](#creating-migration)
-   [Seeding](#seeding)
-   [Registering App on App table](#registering-app-on-app-table)
-   [Define Migration on App's Service Provider](#define-migration-on-apps-service-provider)

> {info} If you are not familiar with its concept. Check out the full [Laravel Migration documentation](https://laravel.com/docs/master/migrations) to get started.

## Creating Migration

Create Laravel migration file and keep it in your `app’s /database/migrations` folder.

```text
/packages/vendor-name/project-name/
                    ├── database
                    │   └── migrations
                    │       └── 2019_03_14_074812_regist_app_to_core_app.php
```

To avoid as much as possible troubles, you migration should:

-   Database table should have a prefix.
-   Creating schema should wrap with the `Schema::hasTable` or `Schema::hasColumn`.

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

## Seeding

If you want to insert some default data when installing your app, put your default data in the same migration file. It is a good idea to wrap it with `Model::unguard()` and `Model::reguard()` while seeding.

```php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;

class RegistNewAppToCoreApp extends Migration
{
    public function up()
    {
        Model::unguard();
        $this->seed();
        Model::reguard();
    }

    private function seed()
    {
        //
    }
}
```

## Registering App on App table

This is mandatory. You need to seed `vendor-name/project-name` on `CoreApps` table.

```php
    private function seed()
    {
        CoreApps::firstOrCreate(['project-name' => 'vendor-name/project-name']);
    }
}
```

Do not forget to change `vendor-name/project-name` to match your name.

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
