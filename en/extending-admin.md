# Extending Admin

- [Overview](#overview)
- [Admin inject](#admin-inject)

## Overview

Usually what you do on your app will run under your own route, what if you want to inject your code to other app's route such as RVsitebuilder's Administrator . Thanks to Laravel blade's `@inject` method. This open possibility to inject your code to our app.

## Admin inject

To inject your code to admin, your need to define your blade file to inject on your `app's service provider.`

```php
public function boot()
{
    $this->defineinject();
}

public function defineinject()
{
    app('rvsitebuilderService')->inject('admin_master','vendor-name/project-name::your blade file');
}
```
Your blade file allow any apps inject code && display on another apps.

>{warning} You can't use concept `@push` in blade but you can use 
` <script>` and `<style>` 