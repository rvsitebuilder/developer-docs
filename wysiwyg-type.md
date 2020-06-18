### code

Editor แบ่งเป็น

1. Layout Editor

- จะประกอบไปด้วย section layout
  จะใช้

```html
data-editor="section|block" data-css="bootstrap|uikit3|native"
เป็นตัวกำหนดว่าจะใช้ css framework อะไรบ้างในระดับ section
contenteditable="true"
```

ใน data-css กรณี native คือไม่ใช้ css framework
ให้เข้าใจง่ายๆคือใน page จะรองรับ css framework ได้หลายตัวพร้อมๆกัน เช่น uikit bootstrap

- คนที่สร้าง layout editor สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้
- คนที่สร้าง app - สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้ (ประกาศในไฟล์ blade นั้น ๆเลย, ถ้าไม่ประกาศจะ assume ค่าตาม template config หรือ detect auto ) เช่น ถนัด bootstrap ก็ใส่ bootstrap มา ในการใช้งานจริง จะถูก convert มาเป็น Native CSS โดยอัตโนมัติ
- คนที่สร้าง template - สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้ ใน ไฟล์ blade ชื่อเดียวกัน (ประกาศในไฟล์ blade นั้น ๆ เลย, ถ้าไม่ประกาศจะ assume ค่าตาม template config หรือ detect auto ) เช่น ถนัด bootstrap ก็ใส่ bootstrap มา ในการใช้งานจริง จะถูก convert มาเป็น Native CSS โดยอัตโนมัติ
- Layout converter ทำหน้าที่
  - convert ส่วนที่เป็น layout ของ bootstrap, uikit, and etc. layout system กลับมาเป็น Native CSS โดยเฉพาะ system page ทั้ง editable และ non-editable
  - กรณีที่ element ไม่ได้ใช้ 'uuk' CSS Class จะต้องทำ Scoped CSS หรือ CSS module ให้กับ code ด้านใน layout ด้วย

2. Element Editor- uuk CSS Class or template CSS class(ถ้ามี)

- Required 'uuk' CSS Class - ทุกคนต้องลง code ตามนี้ ยกเว้นส่วนงาน widget design ที่ จะลง code ด้วย CSS framework ใด ๆ ก็ได้ โดยเราได้สร้าง widget-core editor รองรับไว้ให้แล้ว ต้องวางไว้ใน folder CSS framework ที่ถูกต้องด้วย ถ้าระบบไม่พบ 'uuk' folder สำหรับ widget design ระบบจะต้องทำ Scoped หรือ CSS module ให้กับ code ด้วย (ใช้วิธีส่วนงาน Layout converter ข้อ 2)
  Template CSS Class (optional)
  คนที่สร้าง editor (ซึ่งส่วนใหญ่ คือ เรา) ต้องเขียน code เอง ไม่มี converter ช่วย
  เป้าหมาย เพื่อให้ template designer ที่ถนัด bootstrap อย่างเดียว สามารถ overwrite code ส่วนที่ editor สร้าง code ขึ้นมาได้
  ในการใช้งานกับ email template ตอนกำลัง edit ก็ใช้ uuk ไปเลยได้ แต่ เรา ไปหาทาง convert uuk ให้เป็น mjml อีกที ตอนส่ง น่าจะง่ายกว่า
  Form Editor (เป็น element editor ตัวนึง หรือ ต้องแยกประเภทออกมา)  
  โครงสร้างหลัก
  ชื่อ folder ตัวเล็กหมด และเป็น kabab-case
  ชื่อ file ตัวเล็กหมด และเป็น kabab-case
  refactoring
  wysiwyg/resources/js/(admin|plugins|user|global)/  
   to wysiwyg/resources/js/admin/editors/
  wysiwyg/resources/views/(admin|user)/plugins/  
   to wysiwyg/resources/views/admin/editors/

wysiwyg/resources/js/admin/editors/
wysiwyg/resources/views/admin/editors/

1.           site/    (UI: auk, Generate: no CSS or CSS agnostic)

    1.x site/folder-name - 1 folder คือ 1 plugin เดิม
    เช่น
    1.1 site/main (เดิม คือ core)
    1.2 site/common ( ในนี้มีอะไรบ้าง)
    1.3 site/save
    1.4 site/saveasync ยังใช้อยู่
    1.5 site/savemail
    1.6 site/history (หรือ undo, redo) ,,,,,,,,,,,,,,(ย้ายมาจาก element element เพื้อให้ ระบบ undo,redo ไม่จำกัด แค่ element ก็ได้, อาจจะ undo layout editor ก็ได้)
    1.7 site/font-loader - add google font, ไม่แน่ใจว่า เดิม คืออะไร
    1.8 site/theme-config - (เรียก SCSS complier) มีส่วนงาน Panel Manager ซึ่งต้องใช้ auk
    ?????
    rename
    hide,
    unhide
    set homepage
    rearrange category (ให้ inject มาจาก blog app)

2.           ui/
    \*\* ตรงนี้ยัง สับสนอยู่ และ ทำไม่เหมือนกัน อยู่ เช่น
    admin/editors/ui/toolbar ทำหน้ารวม ปุ่มเพื่อสร้าง toolbar UI และ โดยแต่ละปุ่มไปเรียก Element editor ต่าง ๆ อีกที (และเปิดโอกาสให้ app ต่าง ๆ inject toolbar ui เข้ามาได้),  
    user/editors/ui/rightbar ในส่วนของ section เป็นทั้ง UI และ Layout editor (ประเภท Drag-n-drop) รวมกันอยู่ในนี้
    admin/editors/ui//site-list (pageproperty) เป็นทั้ง UI และ Site editor (rename, hide, delete, and etc.)
    ตรงนี้จริง ๆ เป็น blade file รึเปล่า? มัน ควรไปอยู่ที่ wysiwyg/resources/views/admin/editors folder ถึงจะถูกต้องรึเปล่า?
    แล้ว blade file ที่ใช้ใน JS plugin เดิม เก็บกันอย่างไร ที่ไหน่?
    จริง ๆ แล้ว ต้องแบ่ง folder ย่อย ตามด้านล่าง แบบนี้จริง ๆ รึเปล่า? เพราะ UI พวกนี้ ไม่ควรมี code ในส่วน Layout Editor, Element Editor, and etc. ในนี้ ส่วนงาน เป็นเพียง วิธีการที่จะ list editor ต่าง ๆ มาแสดงบน ตำแหน่งที่ ระบุ เท่านั้น

wysiwyg/resources/js/admin/editors/
wysiwyg/resources/views/admin/editors/
2.1 ui/admin (UI: auk, Generate: auk)
2.1.1 ui/admin/toolbar ==> เปลี่ยนเป็น insert ดีไหม
2.1.1.x ui/admin/toolbar/folder-name - 1 folder คือ 1 plugin เดิม
เช่น
2.1.1.x ui/admin/toolbar/toolbar-group (หรือจะใช้ insert-group ดี) (ใช้สร้าง group insert , ถ้าเพิ่ม group ใหม่ ต้องทำ plugin ใหม่รึเปล่า)  
2.1.2 ui/admin/site-list หรือ site-property ==>เดิม เรียกว่า pageproperty
เช่น
ui/admin/site-list/page/ui.blade.php หรือ ui/admin/site-list/page.blade.php เอาแบบไหน?
ui/admin/site-list/post/ui.blade.php หรือ ui/admin/site-list/post.blade.php เอาแบบไหน?
\*\*\* inject code tab 'Product' จาก 'rvsitebuilder/shop' app ได้อย่างไร?

wysiwyg/resources/js/admin/editors/
wysiwyg/resources/views/admin/editors/
2.2 miniui/admin (UI: auk, Generate: auk)
2.2.1 miniui/admin/toolbar -- สำหรับ สร้าง mini wysiwyg ใช้บน admin UI ซึ่งจะเชื่อมกับ Element Editor

wysiwyg/resources/js/user/editors/
wysiwyg/resources/views/user/editors/
2.2 ui/user (UI: uuk, Generate: uuk)
2.1 ui/user/rightbar ==> เปลี่ยน ชื่อเป็น design-actions และ content-actions แยกกันไป
design action group (ปุ่ม แสดง editor สำหรับ theme, header, banner,and etc.)
Content action group (ปุ่ม แสดง editor สำหรับ sections, form editor, new page, blog, and etc.)
inject code 'ปุ่ม Menu' จาก 'rvsitebuilder/menu' app เมื่อ click ปุึ่ม เปิด 'Menu Placeholder Layout Editor'
2.2.2 ui/user/RightbarEmail ==> เปลี่ยน ชื่อเป็น drag-and-drop-emails , email-actions
new emails
email preview ???

wysiwyg/resources/js/user/editors/
wysiwyg/resources/views/user/editors/
2.4 miniui/user (UI: uuk, Generate: uuk)
2.4.1 miniui/user/toolbar -- สำหรับ สร้าง mini wysiwyg ใช้บน user UI ซึ่งจะเชื่อมกับ Element Editor

wysiwyg/resources/js/user/editors/
wysiwyg/resources/views/user/editors/
\*\*\* layout editor อยู่ที่ user เหรอ?????

1.           layout/       (UI: uuk, Generate: Native CSS flexbox (for section) and Native CSS grid (for block)
    3.x layout/folder-name - 1 folder คือ 1 plugin เดิม
    เช่น
    3.x layout/section-duplicate ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Duplicate Section Layout Editor'
    3.x layout/section-move ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Move Section Layout Editor'
    3.x layout/section-delete
    3.x layout/block-duplicate
    3.x layout/block-move
    3.x layout/block-delete
    3.x layout/section-properties **_ตัวนี้ ข้างในก็มีอีก หลาย tab ควรซอยย่อย ลงไปอีกหรือไม่
    3.x layout/block-properties _**ตัวนี้ ข้างในก็มีอีก หลาย tab ควรซอยย่อย ลงไปอีกหรือไม่
    3.x layout/sidebar

ส่วนงานที่ ไม่แน่ใจว่า เป็น layout editor หรือ element editor
3.x layout/Slide header => คือ editor ที่ใช้กับ header ปัจจุบัน
3.x layout/Hero header => คือ editor ที่ใช้กับ header ปัจจุบัน (ไม่แน่ใจว่า ตัวนี้ จริง ๆ แล้ว ควรเป็น Element Editor รึเปล่า)
ถ้าเรา ไม่จำกัดการใช้งาน เฉพาะ บน Header เท่านั้น จะดีไหม?
และ ดูมันจะ conflict กับ sectionPropreties และ blockProperties ในส่วนของ Background Image รึเปล่า

3.x layout/placeholder/ (มีทั้งใน layout และ element, โดย layout ใช้ native CSS class, element ให้ดูรายละเอียดใน element editor)
3.x.x layout/placeholder/header
3.x.x layout/placeholder/header-email
3.x.x layout/placeholder/footer
3.x.x layout/placeholder/footer-email

wysiwyg/resources/js/user/editors/
wysiwyg/resources/views/user/editors/

1.  element/ - (UI: uuk, Generate: uuk or template CSS class(ถ้ามี)
    4.1 element/placeholder/ placeholder ที่มีทั้งใน layout editor และ element editor โดย placeholder ใน element editor ใช้งานได้บน mini wysiwyg ด้วย โดย HTML ที่เอามาแทน placeholderใน element editor จะต้องไม่มี Native CSS layout (หาทางกรองออก ไม่เช่นนั้นจะเกิด bug ได้ง่าย)
    logo
    email
    name
    phone
    footer menu
    custom (อนาคต)
    menu
    inject code มาจาก app 'rvsitebuilder/menu'
    Menu type ตามชื่อ ID ใน <nav > tag ได้แก่ top, main aside-left, aside-right, footer อ้างอิงตาม
    ยุบ left-menu, right-menu เป็น main-menu และ ต้องเป็น section เพื่อใช้ flexbox feature โดยใช้ flexbox split navigation แทน https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Typical_Use_Cases_of_Flexbox ต้องพิจารณาให้ดีว่า รองรับทุก case จริงหรือไม่
    ส่วนงาน footer menu เช่น Sitemap ไม่ได้ เป็น layout แต่เป็น element editor นะ เอาไงดี???
    LOGO หรือ PHONE -ที่เป็น element placeholder จะสามารถ นำมาเป็นตัวเลือก element บน 'Menu Placeholder Layout Manager' ที่กำลังจะสร้างขึ้นมาใหม่ ได้หรือไม่?

\*\*\*Template Placeholder vs Template Variables
ดูเหมือน ส่วนที่เป็น layout placeholder จะมีความจำเป็น แต่ ส่วนที่เป็น element placeholder น่าจะเปลี่ยนไปใช้ Template variables มากกว่า ยังไม่เห็นความจำเป็น ใด ๆ ในการใช้ placeholder

wysiwyg/resources/js/user/editors/
wysiwyg/resources/views/user/editors/
4.2 element/formatting -- not sure (UI: uuk, Generate: uuk or template CSS class(ถ้ามี))
(1. highlight editable, 2. click button on formatting panel to apply change)
ไมใช่ว่า ทุกปุ่มที่อยู่บน 'formatting panel' จะถือเป็นกลุ่มเดียวกับ formatting element editor เสมอไป ยกตัวอย่าง เช่น ปุ่ม HTML source จัดเป็น Manager Element editor (แล้ว UI ของ formatting panel อยู่ไหน?, ควรย้ายไปรวมกับ UI รึเปล่า?)
4.2.x element/formatting/folder-name - 1 folder คือ 1 plugin เดิม
เช่น
4.2.x element/formatting/StandardWordButton ==> เปลี่ยน ชื่อเป็น basic-text
4.2.x element/formatting/StandardToolsButton ==> เปลี่ยน ชื่อเป็น basic-tools
4.2.x element/formatting/FontFormat ==> เปลี่ยน ชื่อเป็น font
4.2.x element/formatting/SelectStyle ==> เปลี่ยน ชื่อเป็น style
4.2.x element/formatting/Paragraph ==> เปลี่ยน ชื่อเป็น paragraph
ส่วนงานที่หายไป
element/formatting/Separator

wysiwyg/resources/js/user/editors/ หรือ wysiwyg/resources/js/admin/editors/
wysiwyg/resources/views/user/editors/ หรือ wysiwyg/resources/views/user/editors/
พวกนี้มี Manager Panel ของตัวเอง หรือ บางทีก็โหลดใน iframe ด้วย
4.3 element/manager (UI: auk, Generate: uuk or template CSS class(ถ้ามี))
(required separate panel to display manager)
4.3.x element/manager/folder-name - 1 folder คือ 1 plugin เดิม
เช่น
4.3.x element/manager/Responsive == เท่าที่ดูเกี่ยวกับ responVideo(ผมเองก็ไม่ทราบนะครับไม่ได้เป็นคนสร้าง)
4.3.x element/manager/icon ==> เปลี่ยน ชื่อเป็น icon (ทำใหม่ บน UIKIT3 หรือ ใช้ของเดิมไปก่อน)
4.3.x element/manager/PasteFromExternal ==> เปลี่ยน ชื่อเป็น paste-external
4.3.x element/manager/PrintFormat == คือปุ่มที่copy style ของ text เก็บไว้ใน clipboard แล้วเวลาวางก็แค่ไปไฮไลน์ข้อความ จะถูกเปลี่ยน style ชื่อให้เลือก clipboard stylesheet หรือ
4.3.x element/manager/Video ==> เปลี่ยน ชื่อเป็น video
4.3.x element/manager/imageManager ==> เปลี่ยน ชื่อเป็น image-manager
4.3.x element/manager/imageEditor ==> เปลี่ยน ชื่อเป็น image-editor
4.3.x element/manager/Instable ==> เปลี่ยน ชื่อเป็น table และมันสามารถเปลี่ยน editor ให้เหมือน clickup table ได้ไหม
4.3.x element/manager/hyperlink
4.3.x element/manager/Button ( เรียก SCSS complier) ==> เปลี่ยน ชื่อเป็น button
4.3.x element/manager/htmlsource ==> เปลี่ยน ชื่อเป็น html-source
4.3.x element/manager/widget ==> เปลี่ยน ชื่อเป็น widget-core (ถ้ากระทบเยอะ ใช้คำว่า widget เหมือนเดิมก็ได้)
4.3.x element/manager/sitebrand ==> เปลี่ยน ชื่อเป็น sitebrand สำหรับจัดการ logo, email, name, phone ที่ evaluate มาจาก placeholder ??? ใช่เหรอ????

wysiwyg/resources/js/user/editors/ หรือ wysiwyg/resources/js/admin/editors/
wysiwyg/resources/views/user/editors/ หรือ wysiwyg/resources/views/user/editors/
พวกนี้มี Manager Panel ของตัวเอง หรือ บางทีก็โหลดใน iframe ด้วย
4.4 element/manager (UI: uuk, Generate: uuk or template CSS class(ถ้ามี))
มีไหม ? น่าจะมี เช่น element/manager/Instable รึเปล่า

5. Form Editor

## Template

อย่าลืม แท็กต่างๆ ที่อยู่ภายใน `<head>…..</head>`

โครงสร้าง Master ประกอยด้วยตัวแปรและเลเอาท์ครอบนอกสุดมี ID และ Class ที่ใช้ในฝั่ง edit mode และ view mode โดยใช้ Flex css ที่สร้างขึ้นมาเองเป็นหลัก

Master.blade.php

```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Start SEO / Title -->
    <title>sample/master</title>
    <meta name="keyword" content="keyword1, keyword2,...” />
    <meta name="description" content="description" />
    <!-- End SEO / Title -->

    <!-- Start Favicon -->
    <link rel="icon" href="/storage/images/favicon.ico" sizes="32x32" />
    <!-- End Favicon -->

    <!-- Start JS Component -->
    <script src="[[CDN_URL]]/xxxx.js"></script>
    <!-- End JS Component -->

    <!-- Start Css Component -->
    <link rel="stylesheet" href="[[CDN_URL]]/xxx.css" />
    <!-- End Css Component -->

    <!-- Start RVSiteBuilder style -->
    <link rel="stylesheet" href="[[CDN_URL]]/rvsb-css/global.css" />
    <link rel="stylesheet" href="[[CDN_URL]]/rvsb-css/buttonstyle.css" />
    <!-- End RVSiteBuilder style -->

    <!-- Start Theme/Custom Template Style -->
    {ThemeCSS}
    <!-- End Start Theme/Custom Template Style -->
  </head>

  <body id="app-layout">
    <div class="rv-container rv-container-center {{ $fullwidth }}">
      <!-- Set Website Full width -->
      <div class="bodyTemplate">
        <div id="app">
          <div class="rv-flex-wrapper">
            <header id="selected_header">
              {!! $header !!}
            </header>

            <main class="main">
              <div class="container">
                <div id="selected_body">
                  <div class="rv-container rv-container-center">
                    <!-- Start Breadcrumbs -->
                    {!! $Breadcrumbs !!}
                    <!-- End Breadcrumbs -->
                  </div>
                  <div class="rv-container rv-container-center">
                    <!-- Start aside1-->
                    {!! $Left Sidebar !!}
                    <!-- End aside1-->

                    {!! $Page !!}

                    <!-- Start aside2-->
                    {!! $Right Sidebar !!}
                    <!-- End aside2-->
                  </div>
                </div>
              </div>
              <!-- End Container -->
            </main>

            <footer id="selected_footer">
              <div id="rvcmsfooter" class="editable_area">
                <div class="mg">
                  {!! $footer !!}
                </div>
              </div>
            </footer>

            <!-- Navigation Mobile Compatible view-->
            <div id="selected_navigator-mobile">
              {!! $MobileMenu !!}
            </div>
            <!-- End Navigation Mobile Compatible view-->
          </div>
          <!-- End rv-flex-wrapper -->
        </div>
        <!-- End app -->
      </div>
      <!-- End bodyTemplate -->
    </div>
    <!-- End rv-container rv-container-center -->
  </body>
</html>
```

## Head Tag

แท็กต่างๆ ที่อยู่ภายใน `<head>…..</head>`
Site Config , Favicon, css/js Component, css/js ของ RVsitebuilder, Theme/Custom

```html
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Start SEO / Title -->
  <title>sample/master</title>
  <meta name="keyword" content="“keyword" 1, keyword2,...” />
  <meta name="description" content="“description”" />
  <!-- End SEO / Title -->

  <!-- Start Favicon -->
  <link rel="icon" href="/storage/images/favicon.ico" sizes="32x32" />
  <!-- End Favicon -->

  <!-- Start JS Component -->
  <script src="[[CDN_URL]]/xxxx.js"></script>
  <!-- End JS Component -->

  <!-- Start Css Component -->
  <link rel="stylesheet" href="[[CDN_URL]]/xxx.css" />
  <!-- End Css Component -->

  <!-- Start RVSiteBuilder style -->
  <link rel="stylesheet" href="[[CDN_URL]]/rvsb-css/global.css" />
  <link rel="stylesheet" href="[[CDN_URL]]/rvsb-css/buttonstyle.css" />
  <!-- End RVSiteBuilder style -->

  <!-- Start Theme/Custom Template Style -->
  {ThemeCSS}
  <!-- End Start Theme/Custom Template Style -->
</head>
```

## Body

เริ่มแท็ก `<body>…..</body>`
แสดง โครงสร้าง Template ประกอบด้วย `<header>..</header>, <main>..</main>, <footer>..</footer>` มี id #selected_header, #selected_body, #selected_footer, #selected_navigator-mobile อยู่ในแต่ละแท็ก

- โดย ID และ Class ที่ใช้ในฝั่ง edit mode เช่น #app-layout, .bodyTemplate, #app {{ $fullwidth }} ค่า config ที่ใช้ในโปรแกรมเดิม
- ภายใน `<main>..</main>` เรียกไฟล์ blade เลเอาท์ของ sidebar เช่น layout1.blade.php, layout2.blade.php, layout3.blade.php, layout4.blade.php
- ประกอบด้วย {!! $header !!}, {!! $Breadcrumbs !!}, {!! $Sidebar Left !!}, {!! $footer !!},.... จะแทนค่าโดยเรียกมาจากไฟล์ blade

## Header

การทำงาน เรียงสลับกันได้,กำหนด overlap, ซ่อน Banner ได้เหมือนเดิม

โดยการเรียงสลับกันแบ่งเป็น

```html
<section id="selected_topmenu">...</section>
<section id="selected_navigator">...</section>
<section id="selected_headerbanner">...</section>
```

(config เก่า div เก่ายังเอาอยู่) จาก CDN / lib

header.blade.php

```html
<div class="selected_overlap {{ class-design }}">
  <!-- ถ้าเมนู Overlap แบนเนอร์ ใส่คำว่า Overlap -->

  <section id="selected_topmenu">
    <!-- ตัดเป็น top.blade.php -->
    <nav id="topmenu" class="topmenudesign">
      <div class="mg">
        <div class="uk-container uk-container-center rv-block-full">
          <div class="rvsb_design_block bgContent bgTopmenu">
            <div class="uk-container uk-container-center">
              <div class="uk-grid">
                <div class="uk-width-small-1-1">
                  <div class="uk-float-left">
                    <div class="uk-vertical-align-middle uk-hidden-small">
                      <div class="rv_logo"><logo>[[LOGO]]</logo></div>
                    </div>
                  </div>

                  <div class="uk-float-left">
                    <div class="topmenu-minwidth"><tel>[[TEL]]</tel></div>
                  </div>

                  <div class="uk-float-right">
                    <top_nav>[[TOP_NAV]]</top_nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </section>

  <section id="selected_navigator">
    <!-- ตัดเป็น navigation.blade.php -->
    <div class="uk-container uk-container-center rv-block-full">
      <div id="rvnavigator">
        <nav
          class="uk-navbar"
          data-uk-sticky="{top:-200, animation: 'uk-animation-slide-top '}"
        >
          <div class="uk-container uk-container-center">
            <div class="uk-float-left">
              <div class="rv_logo uk-navbar-nav uk-hidden-small"></div>
              <span class="js-left-nav">[[LEFT_NAV]]</span>
            </div>
            <div class="uk-float-right">
              <span class="js-right-nav">[[RIGHT_NAV]]</span>
            </div>
          </div>
          <a
            href="#offcanvas"
            class="uk-navbar-toggle uk-visible-small"
            data-uk-offcanvas=""
          ></a>
          <div class="uk-navbar-brand uk-navbar-center uk-visible-small">
            <logo_mobile>[[LOGO_MOBILE]]</logo_mobile>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <section id="selected_headerbanner {{ class-design }}">
    <!-- หากจะซ่อนแบนเนอร์ระบุ uk-hidden -->
    <div id="editable_area_content-s" class="editable_area">
      <div class="mg">
        <div class="rv-container rv-container-center rv-block-full">
          <!-- เริ่มโค้ดสไลด์ -->
          <div
            id="rvs-uk-slide"
            class="uk-slidenav-position"
            data-uk-slideshow=""
          >
            <ul class="uk-slideshow">
              [[BANNER]]
            </ul>
            <!-- case:มี slide มากกว่า1 -->
            [[BANNER_BUTTON]]
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
```

## Top menu

Top menu `<section id="selected_topmenu"> ..</section>`
Topmenu การทำงานเหมือนเดิม แต่ในดีไซต์เปลี่ยน css เป็นแบบใหม่ ตัวแปรยังคงเหมือนคือ [[LOGO]], [[TEL]], [[TOP_NAV]] มีเลเอาท์หลายดีไซต์
เพิ่มเติม: ซ่อนแถบ topmenu ได้

## Navigation

Navigation / Menu Mobile (มี blade แต่ละดีไซต์ )
`<section id="selected_navigator"> ..</section>`
Navigation เหมือนเดิม แต่ถ้าอยู่ใน sidebarต้องเพิ่ม Class บนแท็ก div Sidebar หรือ Aside Tag เพื่อใช้ควบคุม (Overwrite) class บาง class ของเมนู
เช่น

```
แนวนอน

<div>
  <nav>
    <ul>
      <li><a><span><i class=”rv-icon”></i> Home</span><div class=”rv-badge”></div></a></li>
      <li><a><span><i class=”rv-icon”></i> About</span><div class=”rv-badge”></div></a></li>
      <li><a><span><i class=”rv-icon”></i> Event</span><div class=”rv-badge”></div></a></li>
    </ul>
  </nav>
</div>

แนวตั้ง

<aside class=”nav-vertical”>
  <nav>
    <ul>
      <li><a><span><i class=”rv-icon”></i> Home</span><div class=”rv-badge”></div></a></li>
      <li><a><span><i class=”rv-icon”></i> About</span><div class=”rv-badge”></div></a></li>
      <li><a><span><i class=”rv-icon”></i> Event</span><div class=”rv-badge”></div></a></li>
    </ul>
  </nav>
</ aside>
```

Submenu เดิม : บางดีไซต์ เหมือนเดิม ปัจจุบันเก็บ data ทั้งแท็ก ul li a
Submenu ใหม่ : หากมีโค้ดแตกต่างกัน เช่น Mega menu เพิ่ม/เก็บโค้ด data อย่างไร

## Banner

Banner `<section id="selected_headerbanner"> ..</section>`

- ขนาดภาพมีผลกับความสูงของสไลด์
- จะกำหนดขนาดคงที่
- จะอัพโหลดขนาดอะไรก็ได้แล้วให็โปรแกรมจัดการ
- บางรูปอาจจะมีข้อความในนั้น การย่อรูปจะเป็นอย่างไร

1. Hero (bg)

- แบบไม่มีข้อมูล tag content ใดๆบนแบนเนอร์ ในมือถือต้องมี tool setting : background-size: contain; เพื่อย่อตามจอ
- แบบที่มีข้อมูล `<p>..</p>,<div>..</div>` ความสูง Banner จะตาม Content โดยภาพเป็นพื้นหลังขยายขนาดตามอัตโนมัติ(cover)

2. Image ( `<img src=””…>`) ล้วนๆขนาดตามสเกล image จริง
3. Slide (Component แบบไหน uikit3, bootstrap, flexslide, carousel)

- แบบ bg (สำหรับ uikit2 ใส่เป็น `<img src=””…>` แต่จะถูก compile เป็นภาพื้นหลัง)
- แบบ tag image ตรงๆ (สำหรับ uikit3 ใส่เป็น `<img src=””…>` )
- ปล. เป็นระบบ banner slide Manager (เพิ่ม/ลบรูปได้, ปรับตำแหน่ง text block และใส่ effect ได้) ???

## Layout (Left Sidebar / Page Content / Right Sidebar)

- เปลี่ยนคลาส Grid Block จะต้องเปลี่ยน css
- ส่วนคลาสที่ js เรียกใช้ใน Edit Mode ยังคงเดิมคือ (layoutfix, editable_area_content1, editable_area designBlock)

แบ่งเป็นไฟล์ layout1.blade.php, layout2.blade.php, layout3.blade.php, layout4.blade.php

```html
<div class="rv-container rv-container-center rv-block-full">
  <!-- Set Sidebar delete rv-block-full -->
  <!-- Set Row Full width must use class of Design block -->
  <div class="rv-grid">
    <div
      class="aside aside-1 design-block sidebar-left"
      rv-layout="25"
      style="display:none;"
    >
      <div class="layoutfix">
        <aside>
          <section>
            <div id="editable_area_content1" class="editable_area designBlock">
              {!! $Navigation!!}
              <!--sidebar-right.blade.php -->

              {!! $sidebarLeft !!}
              <!-- (lib/Tempalte/Template.php มีโค้ด uikit อยู่) -->

              เรียกไฟล์ section.blade.php อื่นๆที่มากับ template ได้
            </div>
          </section>
        </aside>
      </div>
    </div>

    <!-- Main -->

    <div class="main design-block sidebar-center" rv-layout="100">
      <div class="layoutfix">
        <div id="editable_area_content" class="editable_area designBlock">
          {!! $breadcrumbs!!} @include('includes.partials.messages')
          @if($slug->isSystem() || $slug->isPost() || $slug->isCategory() ||
          $slug->isNonEditble() || \$slug->isPage()) @yield('content') @endif
          เรียกไฟล์ blade Section อื่นๆที่มากับ template ได้
        </div>
      </div>
    </div>

    <div
      class="aside aside-2 design-block sidebar-right"
      rv-layout="25"
      style="display:block;"
    >
      <div class="layoutfix">
        <aside>
          <section>
            <div id="editable_area_content2" class="editable_area designBlock">
              {!! $Navigation!!}
              <!--sidebar-right.blade.php -->

              {!! $sidebarRight !!}
              <!-- (lib/Tempalte/Template.php) -->

              เรียกไฟล์ blade Section อื่นๆที่มากับ template ได้
            </div>
          </section>
        </aside>
      </div>
    </div>
  </div>
</div>
```

โครงสร้าง section และข้อมูล มาจาก lib หรือ template

## Footer

การทำงานเหมือนเดิม (เปลี่ยน css) โดยมีหลากหลายดีไซต์โดยใส่ตัวแปรมาทั้งหมด แต่หากดีไซต์ไม่ต้องแสดงส่วนนั้นๆให้ใส่ uk-footer-displayShow/uk-footer-displayHide

bottom.blade.php

<!-- footer 1  -->

```html
<div class="uk-container uk-container-center rv-block-full" data-footer="1">
  <div class="rvsb_design_block">
    <div id="footerTemplate">
      <div
        class="uk-container uk-container-center rvsb-bg-footer uk-footer-displayShow"
        id="textinfoAndContactFooter"
      >
        <div class="uk-grid">
          <div
            class="uk-width-medium-3-4 uk-margin-bottom uk-footer-displayShow"
            id="textinfoFooter"
          >
            <h3 id="titleInformation">[[TITLEINFO]]</h3>
            <hr id="hrInformation" />
            <div id="contentInformation" style="white-space: pre-wrap;">
              [[CONTENTINFO]]
            </div>
          </div>
          <div
            class="uk-width-medium-1-4 uk-footer-displayShow"
            id="contactFooter"
          >
            <h3 id="titleContact">[[TITLECONTACT]]</h3>
            <ul class="uk-list uk-list-space" id="contactListFooter">
              <li id="liAddressFooter">
                <div class="tableFrame">
                  <div class="tableCell">
                    <span class="uk-icon-justify uk-icon-map-marker"></span>
                  </div>
                  <div class="tableCell">
                    <span id="addressContactFooter">[[ADDRESS]]</span>
                  </div>
                </div>
              </li>
              <li id="liPhoneFooter">
                <div class="tableFrame">
                  <div class="tableCell">
                    <span id="phoneContactFooter"><tel>[[TEL]]</tel></span>
                  </div>
                </div>
              </li>
              <li id="liEmailFooter">
                <div class="tableFrame">
                  <div class="tableCell">
                    <span class="uk-icon-justify uk-icon-envelope-o"></span>
                  </div>
                  <div class="tableCell">
                    <span id="emailContactFooter"
                      ><email>[[EMAIL]]</email></span
                    >
                  </div>
                </div>
              </li>
            </ul>
            <div class="uk-clearfix"></div>
          </div>
        </div>
      </div>

      <div class="uk-container uk-container-center rvsb-bg-footer">
        <div class="uk-grid" id="socailandcopyright">
          <div
            class="uk-width-small-3-4 uk-margin-bottom uk-text-left-small uk-footer-displayShow"
            id="socialbutton"
            onclick="RVwys.widget.ovewEvent(this)"
            panel=".wys-rowFooterSocial"
            widget="rvsitebuilder/core"
          >
            <div class="rv-ribbon"></div>
            <div class="socailFooter uk-text-left-small">
              <img
                class="imgsocial"
                srcs="[[CDN_URL]]/templates/rvs_library/100/images/thumbnails/widget-social.png"
                id="1623f30cde8252f1f2d4460d0c100015"
                width="200"
                height="22"
                border="0"
                data-appname="rvsitebuilder/core"
                widgetname="social"
                setting_socialicon="block"
                setting_social_icon="1"
                setting_label="Follow us"
                setting_facebook_icon="1"
                setting_facebook_link="#"
                setting_twitter_icon="1"
                setting_twitter_link="#"
                setting_google_icon="1"
                setting_google_link="#"
                setting_instagram_icon="1"
                setting_instagram_link="#"
                setting_line_icon="1"
                setting_line_link="#"
                setting_global="1"
                setting_design="1"
                style="display: none;"
              />
            </div>
          </div>
          <div
            class="uk-width-medium-1-4 uk-margin-bottom uk-text-left-small uk-footer-displayShow"
            id="poweredFooter"
          >
            <powered>[[POWERED]]</powered>
          </div>
        </div>
      </div>

      <div class="uk-container uk-container-center rvsb-bg-footer">
        <div class="uk-text-center uk-footer-displayShow" id="sitemapFooter">
          [[SITEMAP]][[LOGIN]]
        </div>
      </div>

      <div class="uk-container uk-container-center rvsb-bg-footer">
        <div class="uk-text-center" id="copyrightFooter">
          <copyright>[[COPYRIGHT]]</copyright>
        </div>
      </div>
      <div class="uk-clearfix"></div>

      <div
        id="getDetailNavigator"
        cmdalign=""
        cmdtextalign=""
        cmdhiddennav=""
        cmdhiddensubmenu=""
      ></div>
      <div id="getContentWidth" cmdWidth=""></div>
    </div>
  </div>
</div>
```

## Code Mobile Menu

เดิมวางไว้ล่างสุด การทำงานคงเดิมโดยพื้นหลังเมนูบาร์ตามดีไซต์แต่ submenu ใส่สีพื้นคงที่เป็นสีเทาดำ ตัวอักษรขาว

```html
<div id="selected_navigator-mobile">
  {!! $MobileMenu !!}
</div>
```

## Section and Block

- Code Section ตัวใหม่จะใช้ css grid ที่สร้างเอง โดยขึ้นต้นด้วย rv ใช้ขีดกลาง เช่น rv-container, rv-container-center
- มีชื่อคลาสที่บังคับใส่เพื่อให้ js เรียกใช้งานได้คงเดิม คือ mg, rv-block-full, rvsb_design_block, bgContent, rv-grid, contenteditable="true"

```html
<div class="mg">
  <div class="rv-container rv-container-center rv-block-full lazy">
    <!-- Set Row Full width must use class  of Design block -->
    <div class="rvsb_design_block bgContent">
      <!-- Set Background of Design block -->
      <div class="rv-container rv-container-center">
        <!-- Set Full width must use class  of Design block -->
        <div class="rv-grid-margin"></div>

        <div class="rv-grid">
          <div class="rv-col-1-2">
            <div contenteditable="true">
              Your Tilte Here
            </div>
            <div class="rv-grid-margin"></div>
          </div>

          <div class="rv-col-1-2">
            <div contenteditable="true">
              Your Tilte Here
            </div>
            <div class="rv-grid-margin"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```
