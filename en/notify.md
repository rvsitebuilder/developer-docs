# Notify

-   [How to](#how-to)
-   [Notify pop](#notify-pop)
-   [Notify inline](#notify-inline)

Description Notify

## How to

เราใช้ [PNotify](https://sciactive.com/pnotify/) เป็นพื้นฐาน
<br>
มี option ให้ใช้ error,info,success,notice,warning ที่เป็นพื้นฐาน
<br>
ถ้า option ที่ใช้มีไม่เพียงพอแนะนำให้ เข้าไปดู https://sciactive.com/pnotify/
ตัวอย่างการใช้งาน

## Notify pop

success

```js
<script>
    console.pop.success({
        text: 'Message success',
        delay: 1500,
    });
</script>
```

error

```js
<script>
    console.pop.error({
        text: 'Message error',
        delay: 1500,
    });
</script>
```

info

```js
<script>
    console.pop.info({
        text: 'Message info',
        delay: 1500,
    });
</script>
```

notice

```js
<script>
    console.pop.notice({
        text: 'Message notice',
        delay: 1500,
    });
</script>
```

warning

```js
<script>
    console.pop.warning({
        text: 'Message warning',
        delay: 1500,
    });
</script>
```

## Notify inline

```js
<script>
    console.inline.error({
        'target': $("msgError") ,
        'title':'Error',
        'text': 'Hi error',
    });
</script>
```
