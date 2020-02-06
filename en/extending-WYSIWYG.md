# Extending WYSIWYG

- [Overview](#overview)
- [Inject Services](#inject-services)
  - [Toolbar](#toolbar)
  - [Editmode](#editmode)
  - [Viewmode](#viewmode)
  - [Section](#section)
  - [Insert???](#insert)
- [Frontend Event Hooks](#frontend-event-hooks)
  - [beforeSave](#beforesave)
  - [afterSave](#aftersave)
  - [completeSave](#completesave)
- [Backend Event Hooks](#backend-event-hooks)
  - [Saving event](#saving-event)
  - [Saved event](#saved-event)
  
<a name="Overview"></a>

## Overview

Usually what you do on your app will run under your own route, what if you want to inject your code to other app's route such as RVsitebuilder's WYSIWYG. Thanks to `Laravel blade's @inject` method. This open possibility to inject your code to our app.

<a name="Inject-Services"></a>

## Inject Services


To inject your code to WYSIWYG, your need to define your blade file to inject on your `app's service provider`.

On your `app's service provider`, load your application events under boot method.

```php
public function boot()
{
    $this->defineinject();
}
```

 Define injections to insert code to display on other apps.

```php
public function defineinject()
{
    app('rvsitebuilderService')->inject('inject-name','vendor-name/package-name::view blade file');
}
```

### Toolbar
Toolbar inject to
```php
app('rvsitebuilderService')->inject('toolbar','vendor-name/package-name::view blade file');

```
Adding Insert objects

### Editmode
Adding Section objects

```php
    app('rvsitebuilderService')->inject('editmode','vendor-name/package-name::view blade file');
```
<!-- TODO: @tanawat Backend Event Hooks -->

### Viewmode
```php
    app('rvsitebuilderService')->inject('editmode','vendor-name/package-name::view blade file');
```
### Section
```php
    app('rvsitebuilderService')->inject('section','vendor-name/package-name::view blade file');
```
### Insert???

#### ??????

<a name="Frontend-Event-Hooks"></a>

## Frontend Event Hooks

<!-- TODO: @june Backend Event Hooks -->

### beforeSave

### afterSave

### completeSave

<a name="Backend-Event-Hooks"></a>

## Backend Event Hooks

<!-- TODO: @pram Backend Event Hooks -->

### Saving event

### Saved event
