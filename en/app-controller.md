# App Controller

  - [Creating Controller](#Creating-Controller)
  - [Admin Controller](#Admin-Controller)
  - [User Controller](#User-Controller)
  - [Request Validation](#Request-Validation)
  
> {info} If you are not familiar with its concept. Check out the full [Laravel Controller documentation](https://laravel.com/docs/master/controllers) to get started. 

<a name="Creating-Controller"></a>
## Creating Controller

Create Laravel Controller file and keep it in your `app’s /src/Http/Controller` folder. 

```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Http
                    │   │   ├── Controllers
                    │   │   │   └── Admin
                    │   │   │       └── AdminDashboardController.php
                    │   │   │   └── User   
                    │   │   │       └── UserDashboardController.php                                   
                    │   │   └── Requests

```

If you set up App route using `Route::group` suggested on [App Routing](app-routing.md), you will need to separate controller accordingly.

 
<a name="Admin-Controller"></a>

## Admin Controller
 

```php 
    namespace VendorName\PackageName\Http\Controllers\Admin;

    use App\Http\Controllers\Controller; 

    /**
    * Class AdminDashboardController.
    */
    class AdminDashboardController extends Controller
    {
        /**
        * @return \Illuminate\View\View
        */
        public function index()
        {
            return view('admin.dashboard');
        }
    }
``` 

<a name="User-Controller"></a>

## User Controller
 

```php 
    namespace VendorName\PackageName\Http\Controllers\User;

    use App\Http\Controllers\Controller; 

    /**
    * Class UserDashboardController.
    */
    class UserDashboardController extends Controller
    {
        /**
        * @return \Illuminate\View\View
        */
        public function index()
        {
            return view('user.dashboard');
        }
    }
``` 


<a name="Request-Validation"></a>
## Request Validation

Create Laravel Request file and keep it in your app’s /src/Http/Requests folder.
  
```php
/packages/vendor-name/package-name/
                    ├── src
                    │   ├── Http
                    │   │   ├── Controllers                
                    │   │   └── Requests
                    │   │   │   └── Admin
                    │   │   │       └── ExampleRequest.php
                    │   │   │   └── User                     

```

Here is an example of `ExampleRequest`:

```php
    namespace VendorName\PackageName\Http\Requests\Admin;

    use Illuminate\Foundation\Http\FormRequest;  

    class ExampleRequest extends FormRequest
    { 
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
        */
        public function authorize()
        {
            return $this->user()->isAdmin();
        }
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
        */
        public function rules()
        {        
            return [ 
                'attribute-name' => 'required', 
            ];
        }

        public function messages()
        { 
            return [];
        }
    }
```