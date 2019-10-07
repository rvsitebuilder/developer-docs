# Notify
  - [How to](#how-to) 


Description Notify

<a name="how-to"></a>
## How to
มี option |error|info|success|notice|warning
Notify pop

```js
<script>
    console.pop.success({
        text: 'Done',
        delay: 1500,
    });
</script>
Notify inline
```
```js
<script>
    console.inline.error({
        'target': modal.element.find("#msgError") ,
        'title':Error,
        'text': 'Hi error',
    });
</script>

<!-- TODO: @June How to use Notify -->


