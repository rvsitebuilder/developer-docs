# ประเภท Editor

โครงสร้างไฟล์

```
└── wysiwyg/resource/js
│                   ├── admin
│                   ├── user
│                   ├── layout  //folder-name - 1 folder คือ 1 plugin เดิม
│                   │      ├── section-duplicate   ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Duplicate Section Layout Editor'
│                   │      ├── section-move  ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Move Section Layout Editor'
│                   │      ├── section-delete
│                   │      ├── block-duplicate
│                   │      ├── block-move
│                   │      ├── block-delete
│                   │      ├── section-properties ตัวนี้ข้างในก็มีอีกหลาย tab อาจจะต้องแยกเป็น plugin ลงไปอีก
│                   │      ├── block-properties ตัวนี้ข้างในก็มีอีกหลาย tab อาจจะต้องแยกเป็น plugin ลงไปอีก
│                   │      ├── sidebar
│                   │      └── placeholder
│                   |            ├── header
│                   |            ├── header-email
│                   │            ├── footer
│                   │            └── footer-email
│                   ├── element
│                   │      ├── formatting
│                   │      │     ├── basic-text ==> ชื่อเดิม StandardWordButton
│                   │      │     ├── basic-tools ==> ชื่อเดิม StandardToolsButton
│                   │      │     ├── font ==> ชื่อเดิม FontFormat
│                   │      │     ├── style ==> ชื่อเดิม SelectStyle
│                   │      │     └── paragraph ==> ชื่อเดิม Paragraph
│                   │      ├── placeholder
│                   |      |     ├── header
│                   |      |     ├── header-email
│                   │      |     ├── footer
│                   │      |     └── footer-email
│                   │      ├── manager
│                   │      |     ├── video
│                   │      |     ├── responsive-video ชื่อเดิม Responsive
│                   │      |     ├── format-painter  ชื่อเดิม PrintFormat
│                   │      |     ├── image-manager ชื่อเดิม imageManager
│                   │      |     ├── image-editor ชื่อเดิม imageEditor
│                   │      |     ├── table ชื่อเดิม Instable อนาคตจะเพิ่ม plugin table สวยๆลง
│                   │      |     ├── hyperlink
│                   │      |     ├── html-source ชื่อเดิม htmlsource
│                   │      |     ├── button แนวทางใช้ scss complier
│                   │      |     ├── widget-core ชื่อเดิม widget
│                   │      |     ├── icon-uikit2
│                   │      |     ├── icon-uikit3
│                   │      |     ├── responsive-video ชื่อเดิม Responsive
│                   │      |     ├── sitebrand ชื่อเดิม SiteTheme
│                   ├── form-editor
└── wysiwyg/resource/views
│                   ├── user
```

แบ่งเป็น 3 ประเภท

1. [WYSIWYG Layout Editor](wysiwyg-layout-editor.md)
2. [WYSIWYG Element Editor](wysiwyg-type.md)
3. [WYSIWYG Form Editor](wysiwyg-type.md) (เป็น element editor ตัวนึง หรือ ต้องแยกประเภทออกมา)
   [WYSIWYG widget]


#FIXME1: ไม่ใช่แค่ 3 ยังไม่รู้ว่าจะมีเพิ่มอีกไหม เช่น Editor สำหรับ email จะ ออกมาในท่าไหน (v7.6)
#FIXME2: ตาม https://app.clickup.com/t/2freyj มี Site Editor ด้วย พวก rename page, delete page, and etc. (ถ้าไม่เห็นด้วย จะวางไว้ที่อื่น ให้เสนอมา)
#FIXME3: site editor อาจจะต้องมี dom-ready ด้วย ทั้ง ฝั่ง admin and user เหมือน wordpress (https://github.com/WordPress/gutenberg/tree/master/packages/dom-ready)
 - wysiwyg/resources/js/admin/editors/site/dom-ready 
 - wysiwyg/resources/js/user/editors/site/dom-ready    
 #FIXME4: ตาม https://app.clickup.com/t/2freyj มีการจัดแยก การ build ฝั่ง admin และ ฝั่ง user ไว้แล้ว เพื่อตอน build webpack จะได้ไม่ งง
 #FIXME5: form-editor ที่เป็น folder ให้ตัดคำว่า editor ออก
 
# Tools
      - SCSS (and PreCSS)
      - HPQ - https://github.com/aduth/hpq wordpress guternberg ใช้ตัวนี้ในการ lookup DOM (ไม่รู้ว่าเชื่อได้ไหม https://reaktivstudios.com/blog/gutenberg-attributes/ บทความปี 2018)
      - PostCSS, PostHTML,Webpack, PurgeCSS
      - sass-mq (media query: https://github.com/sass-mq/sass-mq)
      - postcss/autoprefixer: https://github.com/postcss/autoprefixer
      - posthtml-style-to-file: https://github.com/posthtml/posthtml-style-to-file
