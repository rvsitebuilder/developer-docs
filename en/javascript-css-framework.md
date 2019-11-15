# JavaScript and CSS Framework

  - [User interface](#User-interface)
  - [Admin interface](#Admin-interface) 
  - [jQuery](#jQuery)
  - [Package-script Blade Stack](#Package-script-Blade-Stack) 
  - [Passing PHP variables to JS through wex and mex](#wex-and-mex)
  - [Vue.js](#Vue) 

RVsitebuilder user and admin interfaces are render independently.

<a name="User-interface"></a>
## User interface
End-user interface is built on [UIKIT2](https://getuikit.com/v2/) framework. It changes dynamically according to the end-user choice of template on the admin area.

> {info} Soon, there will be a choice between `Bootstrap4`, `UIKIT2`, and `UIKIT3`.

<a name="Admin-interface"></a>
## Admin interface
Admin interface is `platform agnostic`. If you generate app from developer app, admin layout suggest bootstrap4. But you can replace it with anything you want. If you use webpack to build your asset, simply build your own and remove the default one.

#### `views/admin/layouts/app.blade.php` with bootstrap4:
```php
@extends('admin.layouts.master')

@section('leftmenu')
	@include('admin.includes.leftmenu', ['package-name' => "vendor-name/package-name"])
@endsection

@push('package-styles')
    <!-- package-styles -->
    {{ style(@mixcdn('css/bootstrap.css', 'vendor/rvsitebuilder/wysiwyg')) }}    
@endpush

@push('package-scripts')
    <!-- package-scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" 
    crossorigin="anonymous"></script>
@endpush
```

<a name="jQuery"></a>
## jQuery 
Loaded as an external script on all pages, both admin and user interface. It has a global scope. You do not need to include it on your app. 

> {warning} Do not use `defer` on your script as it conflict with jQuery.

<a name="Package-script-Blade-Stack"></a>
## Package-script Blade Stack

```php
@push('package-scripts')

@endpush
```

<!-- TODO: @pairote ขยายความด้วย -->

<a name="Wex"></a>
## Wex

<!-- TODO: @june ขยายความด้วย -->
<a name="wex-and-mex"></a>
## Passing PHP variables to JS through wex and mex

<!-- TODO: @june ขยายความด้วย -->

<a name="Vue"></a>
## Vue.js
<!-- TODO: @june ขยายความด้วย -->