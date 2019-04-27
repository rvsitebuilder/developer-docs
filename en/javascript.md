# JavaScript 

RVsitebuilder user and admin interfaces are render independently.

## jQuery 
Loaded as an external script on all pages, both admin and user interface. It has a global scope. You do not need to include it on your app. 

> {warning} Do not use `defer` on your script as it conflict with jQuery.

## User interface
End-user interface is built on [UIKIT2](https://getuikit.com/v2/) framework. It changes dynamically according to the end-user choice of template on the admin area.

Soon, there will be a choice between Bootstrap4, UIKIT2, and UIKIT3.

## Admin interface
Admin interface is `JS platform agnostic`. If you generate app from developer app, admin layout suggest bootstrap4. But you can replace it with anything you want. If you use webpack to build your asset, simply build your own and remove the default one.


## Package-script Blade Stack
push(@package-script)
Endpush

## Wex

## Mex

## Passing PHP variables to JS through wex and mex

## Vue.js
