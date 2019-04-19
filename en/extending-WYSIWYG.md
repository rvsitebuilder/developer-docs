# Extending WYSIWYG

## Overview

Usually what you do on your app will run under your own route, what if you want to inject your code to other app's route such as RVsitebuilder's WYSIWYG.
Thanks to Laravel blade's @inject method. This open possibility to inject your code to our app.

## Inject Services

To inject your code to WYSIWYG, your need to define your blade file to inject on your app's service provider.
```php

inject(xxx, xxxx);
```

### Toolbar

Adding Insert objects

### Editmode

Adding Section objects

### Viewmode


## Frontend Event Hooks

### beforeSave
### afterSave
### completeSave

## Backend Event Hooks

### Saving event

### Saved event


