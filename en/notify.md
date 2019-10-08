# Notify
  - [How to](#how-to) 


Description Notify

<a name="how-to"></a>
## How to
เราใช้ [PNotify](https://sciactive.com/pnotify/) เป็นพื้นฐาน 
<br>
มี option ให้ใช้ error,info,success,notice,warning ที่เป็นพื้นฐาน
<br>
ถ้า option ที่ใช้มีไม่เพียงพอแนะนำให้ เข้าไปดู https://sciactive.com/pnotify/
ตัวอย่างการใช้งาน
# Notify pop
```js
<script>
    console.pop.success({
        text: 'Done',
        delay: 1500,
    });
</script>
# Notify inline
```
```js
<script>
    console.inline.error({
        'target': modal.element.find("#msgError") ,
        'title':Error,
        'text': 'Hi error',
    });
</script>
```


