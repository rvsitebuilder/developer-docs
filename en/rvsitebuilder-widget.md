# RVsitebuilder Widget

## Widget
Widget is a RVsitebuilder special element that make your `editable system page` more dynamic and configurable. 

```php
/packages/author/appname/
                    ├── resources
                    │    └── widgets
                    │       ├── allpanels.blade.php
                    │       ├── allsections.blade.php
                    │       ├── widgetName
                    │       │   ├── designs
                    │       │   │   └── design1.blade.php
                    │       │   ├── panel.blade.php
                    │       │   ├── section.blade.php
                    │       │   └── widget.blade.php
                    ├── src
                        ├── Http
                            ├── Composers
                            │   ├── Widget_ViewComposer.php                        
```

## How it works 

`renderWidget middleware`

## Widget config 

-How-To-Register-Widget-config.md  

    ### Global widget 

    Widget that shows the same content on every page. 


## Widget Blade and Design
 
 Widget blade contains your `app's widget design` according to the user config. 
 
 
<!-- > {info} End-users may edit raw blade file directly on RVsitebuilder WYSIWYG to suit their needs. -->


## View composer 

RVsitebuilder use view composer extensively. Especially using together with middleware to build the widget dynamically. 


## Widget Standard Config Panel

 

## Config Panel Elements
### color picker
### slider

## Widget Frame Config Panel




## Widget Section Template


