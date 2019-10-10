# Event Editor ready
  - [How to](#how-to) 


Description Notify

<a name="how-to"></a>
## How to
เป็น event ของ Editor การทำงานเหมือนกับ [jquery ready](https://api.jquery.com/ready/)
<br>
โดยส่วนใหญ่จะเอาไว้เก็บ event ของ toolbar 
<br>
ตัวอย่างการใช้งาน
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



