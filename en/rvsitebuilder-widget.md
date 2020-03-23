# RVsitebuilder Widget

-   [Widget](#widget)
-   [Create new widget](#create-new-widget)
-   [How it works](#how-it-works)
-   [Widget config](#widget-config)
    -   [Global widget](#global-widget)
-   [Widget Blade and Design](#widget-blade-and-design)
-   [View composer](#view-composer)
-   [Widget Standard Config Panel](#widget-standard-config-panel)
-   [Config Panel Elements](#config-panel-elements)
    -   [color picker](#color-picker)
    -   [slider -->](#slider---)
-   [Widget Section Template](#widget-section-template)

## Widget

Widget is a RVsitebuilder special element that make your `editable system page` more dynamic and configurable.

```php
/packages/vendor-name/project-name/
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

## Create new widget

ขั้นตอนนี้สามารถทำได้หลังจากมีการติดตั้ง Developer App เรียบร้อยแล้ว (<a href="creating-new-app"> Creating New App</a>)

1. บน Topbar คลิกเมนู Apps เลือก ไอคอน Developer
2. ในหน้า Developer คลิกปุ่ม Generate App
3. ระบุ vendor-name และ project-name
4. คลิกปุ่ม create
5. ในหน้า Developer ส่วน Private Apps จะแสดง Apps ใหม่ที่สร้างขึ้นมา
6. คลิกปุ่ม three dots คลิก Generate Widget
7. ระบุชื่อ Widget Name โดยสามารถสร้างได้ไม่จำกัดจำนวน

    ![DeveloperDashboard](images/apps-dev.jpg)

8. จะได้โครงสร้าง widget ดังนี้

    ```php
    /packages/vendor-name/project-name/
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

## Widget config

-How-To-Register-Widget-config.md

Config ส่วนนี้จะมี title และ design เป็นค่าเริ่มต้นที่ใช้ใน Panel Toolbar ส่วนชื่ออื่นๆ ขึ้นอยู่กับการกำหนด Setting การแสดงผลของ Widget Section ที่ใช้งานในหน้าเว็บไซต์

ไฟล์ config >> widget.php

```php
/packages/vendor-name/project-name/
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

## Widget Blade and Design

Widget blade contains your `app's widget design` according to the user config.

โครงสร้างในส่วน Widget ที่มีหลายๆ Layout Design โดยนักพัฒนาสามารถเพิ่มเติมไฟล์และ Config ที่เชื่อมโยงกันดังนี้

```php
── widgets
    |── alltoolbars.blade.php
    ├── widgetName
    │   ├── designs
    │   │   └── design1.blade.php
    |   |   └── design2.blade.php
    │   ├── panel.blade.php
    │   └── widget.blade.php


```

1. ไฟล์ alltoolbars.blade.php เป็นไฟล์ที่โปรแกรม Generate Widget ให้อัตโนมัติ เพื่อแสดงบน Insert Toolbar

```php
@inject('appJson', 'Rvsitebuilder\Manage\Lib\ConfigLib')
<li data-insertwidget>
    <a href="javascript:void(0)">
        <span class="icon-padd wys-insert-tool wys-hyperlink-icon"></span>
        <span>
            @if(isset($appJson->getAppConfig()['vendor-name/project-name']['alias']))
            {{ $appJson->getAppConfig()['vendor-name/project-name']['alias'] }}
        @else
            project-name
        @endif
        </span>
        <span class="uk-icon-caret-right pull-right"></span>
    </a>
    <ul class="ddListLink rv-bgwidget">
        <li>
            <a data-panel='.widgetName' data-widget = 'vendor-name/project-name' data-widgetname='widgetName'><i class='icon-padd wys-insert-tool wys-table-icon'></i>WidgetName</a>
        </li>
        <!--WIDGET_GENERATOR-->
    </ul>
</li>

```

2. ไฟล์ design1.blade.php, design2.blade.php คือการสร้างไฟล์ Layout Design โดยโปรแกรมสร้างตัวอย่างให้ 2 ไฟล์ นักพัฒนาสามารถแก้ไข,เพิ่มเติมไฟล์ได้ตามต้องการ หากมี JavaScript, PHP, HTML, CSS ที่มีความแตกต่างเฉพาะดีไซต์ สามารถวางโค้ดในไฟล์นั้นๆได้

```php
<div class="widgetName-design1">
    <div class="uk-width-1-1 uk-text-left">
        <div class="uk-background-primary">
            <h3 class="uk-h3"> {{$setting['title']}}</h3>
        </div>
    </div>
    <div class="uk-panel">
        Code Design
    </div>
</div>

```

3. ไฟล์ widget.blade.php คือ การเรียกใช้ไฟล์ดีไซต์แบบต่างๆ จากโฟล์เดอร์ designs ถ้านักพัฒนาสร้างไฟล์ design3.blade.php ใหม่ๆขึ้นมา จะต้องเพิ่ม @includeWhen.. ในส่วนนี้ด้วย

```php
<div class="containerWidget">
    @includeWhen($setting['design'] == 1, 'vendor-name/project-name::widgets.widgetName.designs.design1')
    @includeWhen($setting['design'] == 2, 'vendor-name/project-name::widgets.widgetName.designs.design2')
</div>
```

4. ไฟล์ panel.blade.php คือโครงสร้าง Panel Toolbar ที่แสดง Setting Tab และ Design Tab โดยมีรูปแบบดังนี้

    4.1 การตั้งค่า Widget Name และ Widget Title Toolbar

    ```php

    @extends('rvsitebuilder/wysiwyg::admin.layouts.master_widget',
    [
    'appName' => $appName,
    'widgetName' => $widgetName,
    'setting' => $setting
    ])

    @section('widget-title')
    Example Widget  <!-- display widget panel toolbar heading -->
    @overwrite
    ```

    4.2 โค้ดการตั้งค่าต่างๆ เพื่อแสดงใน Setting Tab

    ```php

    @section('widget-setting')

    <div class="title">
         <span>Title</span>
         <input type="text" class="wbInputbox" cmd="setting_title" />
     </div>
     <div class="clear"></div>

    @overwrite
    ```

    4.3 โค้ดการเรียกใช้พาธรูป Thumbnail ของแต่ละ Layout Design เพื่อแสดงใน Design Tab นักพัฒนาสามารถเพิ่มเติมโค้ดเรียกใช้ Thumbnail ใหม่ๆได้

    ```php
    @section('widget-design')

       <div class="uk-margin-small-bottom">Select design</div>
       <div class="rv-thumb-active toolbar-panel-scrollbar">
           <div>
               <label for="widgetName-radio-1">
                   <input type="radio" name="radio" class="widgetName_setting_design wbRadiobox" cmd="setting_design" value="1" id="widgetName-radio-1" style="display:none;">
                   <img alt="" src="/vendor/vendor-name/project-name/images/thumbnail-default-widget-design1.jpg" width="200" height="36" border="0" />
               </label>
           </div>
           <div>
               <label for="widgetName-radio-2">
                   <input type="radio" name="radio" class="widgetName_setting_design wbRadiobox" cmd="setting_design" value="2" id="widgetName-radio-2" style="display:none;">
                   <img alt="" src="/vendor/vendor-name/project-name/images/thumbnail-default-widget-design2.jpg" width="200" height="36" border="0" />
               </label>
           </div>
       </div>

    @overwrite
    ```

<!-- > {info} End-users may edit raw blade file directly on RVsitebuilder WYSIWYG to suit their needs. -->

## View composer

RVsitebuilder use view composer extensively. Especially using together with middleware to build the widget dynamically.

## Widget Standard Config Panel

<!--

TODO: @Jatuporn help me please.

## Config Panel Elements
### color picker
### slider -->

## Widget Section Template

โครงสร้าง Widget Section ที่ใช้งานในเมนู Content >> Section >> Widget Name

```php
/packages/vendor-name/project-name/
                ├── resources
                │    └── views
                │       └── sections
                │           ├── allsections.blade.php
                |           |── sectionicon.blade.php
                │           ├── widgetName
                │           │   ├── 1-section.blade.php


```

1. โครงสร้างไฟล์ allsections.blade.php แสดงการเรียกใช้ไฟล์ widget ซึ่งโปรแกรมสร้างให้อัตโนมัติ

```php
<div class="section-category rv-widget-project-name" style="display: none; margin-top: -12px;">
    <div id="widget-project-name" class="widgetSection widget-project-name" style="margin:0 auto;">
        <div id="widget-project-name" class="widgetform">
            @include('vendor-name/project-name::sections.widgetName-first.1-section')
            @include('vendor-name/project-name::sections.widgetName-second.1-section')
        </div>
    </div>
</div>
```

2. โครงสร้างไฟล์ sectionicon.blade.php แสดงการเรียกใช้ project-name และ Icon บน Content Sections

```php
@inject('appJson', 'Rvsitebuilder\Manage\Lib\ConfigLib')

<div onclick="content_class('rv-widget-project-name');" class="section-name active-section-name">

    <!-- Change Icon Here -->
    <span class="uk-icon uk-icon-home rv-icon-size"></span>


    @if(isset($appJson->getAppConfig()['vendor-name/project-name']['alias'] ) )
        {{ $appJson->getAppConfig()['vendor-name/project-name']['alias'] }}
    @else
        project-name
    @endif
</div>
```

3. โครงสร้างไฟล์ 1-section.blade.php แสดงการเรียกใช้พาธรูป Thumbnail ของ widgetName

````php
<icon-widget>
    <div class="blockWidget" title="widgetName" widget="vendor-name/project-name" widgetname="widgetName">
        <div>
            <div class="view"></div>
            <img class="imgwidgetName"  alt=""
                srcs="/vendor/vendor-name/project-name/images/thumbnail-widgetname-design1.png"
                data-appname="vendor-name/project-name" widgetname="widget">
        </div>
    </div>
</icon-widget>
<design>
    @include('rvsitebuilder/core::layouts.widget_wys_master_header')
    <img srcs="/vendor/vendor-name/project-name/images/thumbnail-default-widget-design1.png" title="category_list"  alt="">
    @include('rvsitebuilder/core::layouts.widget_wys_master_footer')
</design>

    ```

````

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
