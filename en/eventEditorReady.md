# Event Editor ready
  - [How to](#how-to) 


Description Notify

ในหน้า wysiwyg จะมี iframe 2 ส่วนและจะมี event  ของใครของมันที่ชื่อว่า editorReady,widgetReady จะทำงานแยกกันโดยมี iframe มากันการทำงานโดยมีลักษณะเป็น event ของ Editor การทำงานเหมือนกับ [jquery ready](https://api.jquery.com/ready/)การทำงานแตกต่างกันดังนี้
![editorready](/en/images/editorready.jpg)
## Editor ready
โดยส่วนใหญ่จะเอาไว้เก็บ event หลักของ toolbar (เป็น toolbar หลักที่ไม่อยากให้ไปปะปนกับ template หลายๆ toolbar จะไว้ที่นี้)kเช่น ปุ่ม เปลี่ยน font ปุ่มเปลี่ยนตัวหน้า ตัวเอียง ปุ่ม insert table youtube ปุ่มหลักๆที่อยู่บน topbar และ panel
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
## widget ready
เป็น event หลักของ toolbar มีจำเป็นต้องอยู่ใน template เช่น drag&drop event 
```js
<script>
    $(function() {
  	    $(document).bind('widgetReady',function(){
            alert('editor ready ')
            $('body').click(function(){
                //event action
            })
        })
    });

</script>
```



