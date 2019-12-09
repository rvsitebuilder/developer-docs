# Extending Admin
- [Overview](#overview)
- [Inject Services](#inject-services)
## Overview

Usually what you do on your app will run under your own route, what if you want to inject your code to other app's route such as RVsitebuilder's Administrator . Thanks to Laravel blade's `@inject` method. This open possibility to inject your code to our app.

## Inject Services

To inject your code to admin, your need to define your blade file to inject on your `app's service provider.`
```php
app('rvsitebuilderService')->inject('admin_master', '');
```