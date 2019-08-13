# RVsitebuilder Widget
  - [Widget](#Widget)
  - [How it works](#How-it-works) 
  - [Widget config](#Widget-config)
  - [Widget Blade and Design](#Widget-Blade-and-Design) 
  - [View composer](#View-composer)
  - [Widget Standard Config Panel](#Widget-Standard-Config-Panel) 
  <!-- - [Config Panel Elements](#Config-Panel-Elements) -->
  - [Widget Section Template](#Widget-Section-Template) 

<a name="Widget"></a>
## Widget
Widget is a RVsitebuilder special element that make your `editable system page` more dynamic and configurable. 

```php
/packages/vendor-name/package-name/
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
<a name="How-it-works"></a>
## How it works 

`renderWidget middleware`

<a name="Widget-config"></a>
## Widget config 

-How-To-Register-Widget-config.md  

### Global widget 

Widget that shows the same content on every page. 

<a name="Widget-Blade-and-Design"></a>
## Widget Blade and Design
 
 Widget blade contains your `app's widget design` according to the user config. 
 
 
<!-- > {info} End-users may edit raw blade file directly on RVsitebuilder WYSIWYG to suit their needs. -->

<a name="View-composer"></a>
## View composer 

RVsitebuilder use view composer extensively. Especially using together with middleware to build the widget dynamically. 

<a name="Widget-Standard-Config-Panel"></a>
## Widget Standard Config Panel

 
<!-- 
<a name="Config-Panel-Elements"></a>
TODO: @Jatuporn help me please.

## Config Panel Elements
### color picker
### slider -->



<a name="Widget-Section-Template"></a>
## Widget Section Template


