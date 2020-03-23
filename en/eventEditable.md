# Editable event

-   [wysiwyg](#wysiwyg)

## wysiwyg

หน้า wysiwyg จะมี contentEdiable กระจัดกระจายอยู่เพื่อให้สามารถพิมแก้ไขข้อความหรือใส่รูปใส่designได้
จะสามารถใส่ event ต่างๆของ [jquery](https://api.jquery.com/category/events/) ได้ทั้งหมด ต้องผ่าน function RVwys.designViewAddEvent()
![contenteditable](images/contentEditable.jpg)
ตัวอย่าง

```javasript
<script>
    $(function() {
  	    wys.event(':mousedown', function(e) {
            console.log('mousedown tag '+$(e.target).tagName)
          }

        wys.event(':click', function(e)  {
            console.log('click tag '+$(e.target).tagName)
          }
    });

</script>
```
