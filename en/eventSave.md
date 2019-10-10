# Save
  - [How to](#how-to) 


Description Notify

<a name="how-to"></a>
## How to
เป็น event listener ในรูปแบบ jQuery 


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




