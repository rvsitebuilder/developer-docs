# Event Editor ready
  - [How to](#how-to) 


Description Notify


เป็น event ของ Editor การทำงานเหมือนกับ [jquery ready](https://api.jquery.com/ready/)จะมี2แบบ editorReady,widgetReady การทำงานแตกต่างกันดังนี้
## Editor ready
โดยส่วนใหญ่จะเอาไว้เก็บ event ของ toolbar (เป็น toolbar หลักที่ไม่อยากให้ไปปะปนกับ template หลายๆ toolbar จะไว้ที่นี้)เช่น ปุ่ม เปลี่ยน font ปุ่มเปลี่ยนตัวหน้า ตัวเอียง ปุ่ม insert table youtube ปุ่มหลักๆที่อยู่บน topbar และ panel
<br>
ตัวอย่างการใช้งาน
```js
<script>
    $(function() {
  	    $(document).bind('editorReady',function(){
            alert('editor ready ')
            $('body').click(function(){
                //event action
            })
        })
    });

</script>
```
## Editor ready
```js
<script>
    $(function() {
  	    $(document).bind('editorReady',function(){
            alert('editor ready ')
            $('body').click(function(){
                //event action
            })
        })
    });

</script>
```



