- [Create Widget](#Create Widget)
- [Webpack](#Webpack)
- [Webpack](#Color Picker)

# Create Widget

จะอธิบายตั้งแต่เริ่มสร้าง app
ไปที่ rightbar on top click Apps แล้วเลือก ![icon developer](images/iconDeveloper.png)
![create app](images/createApp1.png)
<br>
เลือก Generate App ![icon genapp](images/icon_genapp.png)
![create app](images/createApp2.png)
<br>
เราจะทดสอบสร้าง appขึ้นมาแบบ ง่ายๆ โดยใช้ชื่อ App name ว่า "Test Apps" และชื่อ project name ว่า "proj1"
![appgen](images/appgenerator.png)

กดสร้างที่ generator widget
<br>
![getwidget](images/genwidget.png)
<br>
ตั้งชื่อ widget ที่จะทดสอบว่า "widget-colorpicker"
![getwidget](images/genwidget2.png)
<br>
หลังจากนั้นให้กลับไปที่หน้า "Content"
<br>
![getwidget](images/gotocontent.png)
เราจะเห็นwidgetที่ถูกสร้างขึ้นมา 2 ที่ ดังรูป
![getwidget](images/wyswidget1.png)
<br>
![getwidget](images/wyswidget2.png)
<br>
ให้ทดสอบ insert widget ลงใน editor จะ insert แบบไหนก็ได้ แต่ในตัวอย่างจะ insert แบบ section
จะเห็น panel ขึ้นมาด้านขวาเราจะใส่ colorpickerในนั้น
<br>
![getwidget](images/wyswidget2.png)
<br>
ถ้าไม่อยากทดสอบในหน้า content สามารถทดสอบบน address bar ได้ โดยใส่ ดังนี้ " http://192.168.100.82/admin/wysiwyg/common/widgetframe/vendertest1/p1/widget-colorpicker "
<br>
![getwidget](images/wyswidget4.png)

# Webpack

แนะนำให้ดู create widget ก่อน [Create Widget](createwidget.md)
ขั้นตอนการใส่ javascript ใช้งานร่วมกับ webpack โดยจะอธิบายการเรียกใช้ "colorpicker" จาก node_module ให้ใช้งานร่วมกับ widget ได้อย่างไรดังนี้
ต้องติดตั้ง node_module ก่อนที่ packages/vendertest1/p1

```php
cd /localhost/packages/vendertest1/p1
npm run install
```

ให้เปิดไฟล์ packages/vendertest1/pi/webpack.mix.js
ใส่ code ดังนี

```php
mix.js(
    'resources/js/admin/widget-colorpicker.js',
    'js/widget-colorpicker.js.js'
);
mix.sass(
    'resources/css/widget-colorpicker.scss',
    'public/css/widget-colorpicker.css'
);

```

แนะนำให้ดู [laravel mix](https://laravel.com/docs/7.x/mix)
<br>![webpack](images/webpack1.png)

เปิดไฟล์ 'packages/vendertest1/p1/resources/js/admin/widget-colorpicker.js'
ให้ใส่ code

```php
import 'spectrum-colorpicker';
```

![npm](images/webpack2.png)

เปิดไฟล์ 'packages/vendertest1/p1/resources/css/widget-colorpicker.scss'
ให้ใส่ code

```css
@import '~spectrum-colorpicker/spectrum';
```

![npm](images/webpack3.png)
หลังจากนั้นให้ npm run dev เพื่อให้ webpack สร้างไฟล์ขึ้นมา แนะนำให้ดูข้อมูล [laravel mix](https://laravel.com/docs/6.x/mix)

```php
จากตัวอย่าง
cd /localhost/packages/vendertest1/p1
npm run dev
```

![npm](images/webpack4.png)
\*\*\* ถ้าเราเขียน script หรือ เปลี่ยนแปลงในไฟล์ นี้
packages/vendertest1/p1/resources/js/admin/widget-colorpicker.js
packages/vendertest1/p1/resources/css/widget-colorpicker.scss
จำเป็นต้อง npm run dev

# Color Picker

หลังจากที่ [Create Widget](createwidget.md) และ เตรียมไฟล์ [Webpack](usewebpackAndNPM.md) แล้ว
จะอธิบายการใส่ colorpicker ลงบน panel ดังภาพที่2
![wyswidget](images/wyswidget3.png)
ให้เปิดไฟล์ packages/vendertest1/p1/resources/views/widgets/widget-colorpicker/panel.blade.php
<br>
![panel](images/panelcolorpicker1.png)
<br>
ให้ใส่ script แบบนี้ล่างสุดของไฟล์ panel.blade.php

```php
<label for="widget-colorpicker-input">
    <input type="text" name="radio" class="wbSetcolor" id="widget-colorpicker-input" >
</label>
@push('package-styles')
{{ style(mix('css/widget-colorpicker.css', 'vendor/vendertest1/p1')) }}	// เชื่อมต่อกับไฟล์ js ใน webpack
@endpush
@push('package-scripts')
{{ script(mix('js/widget-colorpicker.js', 'vendor/vendertest1/p1')) }} // เชื่อมต่อกับไฟล์ js ใน webpack
<script>
$(function() {
  // Handler for .ready() called.
    $( document ).ready(function() {
        $('.wbSetcolor').spectrum({
            showAlpha: true,
            showInput: true,
            allowEmpty: true,
            preferredFormat: 'rgb',
            change: function(color) {
                var fb = parent.$('#frameBody').get(0).contentWindow; //ถ้าต้องการเชื่อมกับ wys ให้เรียก ผ่านตัวนี้ เพราะ editor มีการทำงาน frame หลายชั้น
                var id = parent.elmSetWidget.get(0).id;
                fb.$('#' + id).attr('setting_color', color.toHexString());
            },
        });

    });
});

</script>
@endpush
```

![panel](images/panelcolorpicker2.png)
<br>
ให้ทดสอบผลในหน้า editor จะแสดง icon colorpicker ![panel](images/panelcolorpicker3.png)ขึ้นมา
<br>
![panel](images/panelcolorpicker4.png)
<br>
จะอธิบายเรื่อง tab panel จะมี 2 tab ชื่อ setting และ design
![panel](images/panelcolorpicker5.png)
<br>
<b>setting</b> จะสัมพันธ์กับ'-- start setting tab &#123;&#123;--'ข้อมูลที่อยู่ในนี้จะแสดงใน tab setting '--&#125;&#125; end setting tab --'
<br>
![panel](images/panelcolorpicker6.png)
<br>
<b>design</b> จะสัมพันธ์กับ'-- start design tab &#123;&#123;--'ข้อมูลที่อยู่ในนี้จะแสดงใน tab setting '--&#125;&#125; end design tab --'
<br>
![panel](images/panelcolorpicker7.png)
