# RVsitebuilder Widget

- [Widget](#widget)
- [Create new widget](#create-new-widget)
- [How it works](#how-it-works)
- [Widget config](#widget-config)
- [Widget Blade and Design](#widget-blade-and-design)
- [View composer](#view-composer)
- [Widget Standard Config Panel](#widget-standard-config-panel)
- [Config Panel Elements](#config-panel-elements)
- [Widget Section Template](#widget-section-template)
  <!-- - [Config Panel Elements](#Config-Panel-Elements) -->
- [Widget Section Template](#Widget-Section-Template)

<a name="Widget"></a>

## Widget

Widget is a RVsitebuilder special element that make your `editable system page` more dynamic and configurable.

```php
/packages/vendor-name/package-name/
                    ├── resources
                    │    ├── js
                    │    │  └── admin
                    │    │      └── widget.js
                    │    └── views
                    │       ├── sections
                    │       │   ├── allsections.blade.php
                    │       │   ├── sectionicon.blade.php
                    │       │   ├── widgetName
                    │       │   │   └── 1-section.blade.php
                    │       └── widgets
                    │           ├── alltoolbars.blade.php
                    │           ├── widgetName
                    │           │   ├── designs
                    │           │   │   └── design1.blade.php
                    │           │   ├── panel.blade.php
                    │           │   └── widget.blade.php
                    ├── src
                    │   └── Http
                    │       ├── Composers
                    │       │   └── Widget_ViewComposer.php
```

<a name="Create-new-widget"></a>

## Create new widget

<a name="How-it-works"></a>
ขั้นตอนนี้สามารถทำได้หลังจากมีการติดตั้ง Developer App เรียบร้อยแล้ว (<a href="creating-new-app"> Creating New App</a>)

1. บน Topbar คลิกเมนู Apps เลือก ไอคอน Developer
2. ในหน้า Developer คลิกปุ่ม Generate App
3. ระบุ vendor-name และ project-name
4. คลิกปุ่ม create
5. ในหน้า Developer ส่วน Private Apps จะแสดง Apps ใหม่ที่สร้างขึ้นมา
6. คลิกปุ่ม treedots คลิก Generate Widget
7. ระบุชื่อ Widget Name โดยสามารถสร้างได้ไม่จำกัดจำนวน

   ![DeveloperDashboard](images/apps-dev.jpg)

8. จะได้โครงสร้าง widget ดังนี้

   ```php
   /packages/vendor-name/package-name/
                    ├── resources
                    │    └── views
                    │       ├── sections
                    │       └── widgets
                    │           ├── alltoolbars.blade.php
                    │           ├── widgetName-first
                    │           │   ├── designs
                    │           │   │   └── design1.blade.php
                    │           │   ├── panel.blade.php
                    │           │   └── widget.blade.php
                    |           ├── widgetName-second
                    │           │   ├── designs
                    │           │   │   └── design1.blade.php
                    │           │   ├── panel.blade.php
                    │           │   └── widget.blade.php
   ```

ปล. การนำไปใช้งานใน wysiwyg ไปที่เมนู Content >> Section >> Your Widget Name

## How it works

`renderWidget middleware`

<a name="Widget-config"></a>

## Widget config

-How-To-Register-Widget-config.md

Config ส่วนนี้จะมี title และ design เป็นค่าเริ่มต้นที่ใช้ใน Panel Toolbar ส่วนชื่ออื่นๆขึ้นอยู่กับการกำหนด Setting ต่างๆ ของ Widget

ไฟล์ config >> widget.php

```php
/packages/vendor-name/package-name/
                ├── config
                │    └── widget.php
```

```php

<?php

return [
    'widgetName' => [
        'blade' => 'widgets.widgetName.widget',
        'frame-style' => 'width:250px;height:460px;',
        'setting' => [
            'title' => 'Example Widget',
            'design' => 1,
            'showdate' => 1,
            'showhours' => 1,
            'showminutes' => 1,
            'showseconds' => 1,
            'icon' => 'uk-icon-clock-o',
            'format' => '12',
        ],
    ],

];

```

### Global widget

Widget that shows the same content on every page.

<a name="Widget-Blade-and-Design"></a>

## Widget Blade and Design

Widget blade contains your `app's widget design` according to the user config.

ในส่วน Widget ที่มีหลายๆ Design นอกจากจะกำหนดค่า config แล้ว ยังต้องเพิ่มโค้ดที่สอดคล้องหรือเชื่อมโยงกันดังนี้

1. ไฟล์ widget.blade.php คือ กำหนดการเรียกใช้ไฟล์ดีไซต์แบบต่างๆ ตามจำนวนที่ต้องการ

   ```php
   <div class="containerWidget">
       @includeWhen($setting['design'] == 1, 'vendor-name/package-name::widgets.widgetName.designs.design1')
       @includeWhen($setting['design'] == 2, 'vendor-name/package-name::widgets.widgetName.designs.design2')
   </div>
   ```

2. ไฟล์ panel.blade.php คือ Panel Toolbar ที่แสดง Setting Tab และ Design Tab โดยมีรูปแบบดังนี้

   2.1 การตั้งค่า Widget Name และ Widget Title

   ```php

   @extends('rvsitebuilder/wysiwyg::admin.layouts.master_widget',
   [
   'appName' => $appName,
   'widgetName' => $widgetName,
   'setting' => $setting
   ])

   @section('widget-title')
   Example Widget
   @overwrite
   ```

   2.2 วางโด้ด Html, PHP, CSS, Java Script เพื่อแสดงใน Setting Tab

   ```php

   @section('widget-setting')

   <div class="title">
        <span>@lang('rvsitebuilder/wysiwyg::common.Title') </span>
        <input type="text" class="wbInputbox" cmd="setting_title" />
    </div>
    <div class="clear"></div>

   @overwrite
   ```

   2.3 โค้ดการเรียกใช้พาธรูป Thumbanil ของแต่ละดีไซต์ เพื่อแสดงใน Design Tab

   ```php
   @section('widget-design')

      <div class="uk-margin-small-bottom">Select design</div>
      <div class="rv-thumb-active toolbar-panel-scrollbar">
          <div>
              <label for="widget-radio-1">
                  <input type="radio" name="radio" class="wbRadiobox" cmd="setting_design" value="1" id="" style="display:none;">
                  <img alt="" src="{{ config('rvsitebuilder/wysiwyg.wex.url.WYS_IMG_URL') }}/images/thumbnail-default-widget-design.jpg" width="200" height="36" border="0" />
              </label>
          </div>
      </div>

   @overwrite
   ```

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

แสดงการใช้งานในเมนู Content >> Section >> Widget Name
มีโครงสร้างดังนี้

```php
/packages/vendor-name/package-name/
                ├── resources
                │    └── views
                │       └── sections
                │           ├── allsections.blade.php
                |           |── sectionicon.blade.php
                │           ├── widgetName
                │           │   ├── 1-section.blade.php


```

โครงสร้างโค้ด Widget Section Template โดยพาธรูป Thumbnail สามารถเปลี่ยนแปลงได้

```php
<icon-widget>
    <div class="blockWidget" title="widgetName" widget="vendor-name/package-name"
        widgetname="widgetName">
        <div>
            <div class="view"></div>
            <img class="imgwidgetName"  alt=""
                srcs="{{ config('rvsitebuilder/wysiwyg.wex.url.WYS_IMG_URL') }}/images/thumbnail-widgetname-design1.png"
                 data-appname="vendor-name/package-name" widgetname="widget">
        </div>
    </div>
</icon-widget>
<design>
    @include('rvsitebuilder/core::layouts.widget_wys_master_header')
    <img srcs="{{ config('rvsitebuilder/wysiwyg.wex.url.WYS_IMG_URL') }}/images/thumbnail-default-widget-design1.png" title="category_list"  alt="">
    @include('rvsitebuilder/core::layouts.widget_wys_master_footer')
</design>

```

```

```

```

```

```

```

```

```

```

```
