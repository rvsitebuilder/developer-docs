Layout Editor

จะประกอบไปด้วย section layout จะมีข้อกำหนดเบื้องต้นดังนี้

```html
<div class="mg" data-editor="section" data-css="uikit3">
  <div uk-grid>
    <div>
      <div uk-grid>
        <div></div>
        <div></div>
      </div>
    </div>
    <div>
      <div uk-grid>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
</div>
```

data-editor="section|block" จะมีให้เลือก section กับ block<br>
data-css="bootstrap|uikit3|native" จะเป็นตัวระบุว่าใช้ css framework อะไรบ้างและในกรณี data-css = native คือไม่ใช้ css framework กล่าวคือไม่ทำอะไรเลย
ส่วนรายละเอียดการออกแบบ template [Design Section](designer-docs/wysiwyg-layout-editor.md)
สรุปแล้วให้เข้าใจง่ายๆคือใน page จะรองรับ css framework ได้หลายตัวพร้อมๆกัน เช่น uikit bootstrap สามารถอยู่ในหน้าเดียวกันได้
ประโยชน์ที่จะได้รับดังนี้

- คนที่สร้าง layout editor สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้
- คนที่สร้าง app - สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้ (ประกาศในไฟล์ blade นั้น ๆเลย, ถ้าไม่ประกาศจะ assume ค่าตาม template config หรือ detect auto ) เช่น ถนัด bootstrap ก็ใส่ bootstrap มา ในการใช้งานจริง จะถูก convert มาเป็น Native CSS โดยอัตโนมัติ
- คนที่สร้าง template - สามารถลง code ด้วย CSS framework ใด ๆ ก็ได้ ใน ไฟล์ blade ชื่อเดียวกัน (ประกาศในไฟล์ blade นั้น ๆ เลย, ถ้าไม่ประกาศจะ assume ค่าตาม template config หรือ detect auto ) เช่น ถนัด bootstrap ก็ใส่ bootstrap มา ในการใช้งานจริง จะถูก convert มาเป็น Native CSS โดยอัตโนมัติ
