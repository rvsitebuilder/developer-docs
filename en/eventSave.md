# Save
  - [How to](#how-to) 


Description Notify

<a name="how-to"></a>
## How to
มี 2รูปแบบให้ใช้ ควรจะเลือกให้เหมาะสม
1. เป็น event listener ในรูปแบบ [jQuery](https://api.jquery.com/category/events/) 


<br>
มี option ให้ใช้ error,info,success,notice,warning ที่เป็นพื้นฐาน
<br>
ตัวอย่างการใช้งานจะอยู่ภายใต้ event[editorReady](eventEditorReady.md)
## Save 
```js
<script>
$(function() {
    $(document).bind('editorReady',function(){
        $('#saveall').click(function(){
            alert('social ')
        })
    })
})
</script>
```
2.เป็น event callback ใน function save sync(เป็น Synchronous function จะรอการทำงาน ข้อควรระว่ังต้องแน่ใจว่าfunctionที่สร้างไม่ติด loop หรือ debug ก่อนเสร็จงาน)
<br>
มี event ดังนี้ 
ตัวอย่างการใช้งาน beforeSave,saveComplete,afterSaveSuccess,afterSaveError

```js
<script>
$(function() {
        $(document).bind('beforeSave',function(){
            console.log('test beforeSave');
            
        });
        $(document).bind('saveComplete',function(){
            console.log('test saveComplete');
            
        });
        $(document).bind('afterSaveSuccess',function(){
            console.log('test afterSaveSuccess');
            
        });
        $(document).bind('afterSaveError',function(){
            console.log('test afterSaveError');
            
        });
    })
</script>
```



