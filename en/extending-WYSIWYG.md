# Extending WYSIWYG

- [Overview](#overview)
- [Inject Services](#inject-services)
  - [Inject User](#inject-user)
  - [Toolbar](#toolbar)
  - [Editmode](#editmode)
  - [Viewmode](#viewmode)
  - [Section](#section)
  - [Insert???](#insert)
  - [??????](#)
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

### Inject User

To inject your code to WYSIWYG, your need to define your blade file to inject on your `app's service provider`.

```php

inject(xxx, xxxx);
```

### Toolbar

Adding Insert objects

### Editmode

Adding Section objects

<!-- TODO: @tanawat Backend Event Hooks -->

### Viewmode

### Section

### Insert???

### ??????

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
