# CSS Framework

RVsitebuilder user and admin interfaces are render independently.

## User interface
End-user interface is built on [UIKIT2](https://getuikit.com/v2/) framework. It changes dynamically according to the end-user choice of template on the admin area.

Soon, there will be a choice between Bootstrap4, UIKIT2, and UIKIT3.

## Admin interface
Admin interface is CSS platform agnostic. If you generate app from developer app, admin layout suggest bootstrap4. But you can remove it. If you use webpack to build your asset, simply build your own and remove the default one.

app's admin layout with bootstrap4:
```php


..
```

## Package-style Blade Stack


```php
push(@package-style)
..
endpush
```
