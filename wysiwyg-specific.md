# ประเภท Editor

โครงสร้างไฟล์

```
└── wysiwyg/resource/js
│                   ├── admin
│                   ├── user
│                   ├── layout(Layout editor)  //folder-name - 1 folder คือ 1 plugin เดิม
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
│                   ├── element(Element editor)
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
│                   ├── site(Site Editor)
│                   │      ├── main(เดิม คือ core)
│                   │      ├── common ( ในนี้มีอะไรบ้าง เด๋วจะมาแตกทีหลังจากทำ main เสร็จ)
│                   │      ├── saveasync ( ในนี้มีอะไรบ้าง)
│                   │      ├── savemail
│                   │      ├── history (หรือ undo, redo พัฒนาให้ใช้ร่วมกันทั้งหมดform-editor email-editor layout-editor)
│                   │      ├── font-loader (หรือ undo, redo พัฒนาให้ใช้ร่วมกันทั้งหมดform-editor email-editor layout-editor)
│                   │      ├── theme-config
│                   │      ├── rename (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── hide (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── unhide (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── set-homepage (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── rearrange-category  inject มาจาก  blog app(อาจจะมีการเปลี่ยนทีหลัง)
│                   ├── form(Form Editor)
│                   ├── email(Email Editor)

---------------------------------------------------------
└── wysiwyg/resource/views/admin/editors (เก็บ design ของ ปุ่ม ui modal panel dialog)
│                   ├── admin (โครงสร้างเดียวกับ js ถ้าต้องมีีui)
│                   ├── user (โครงสร้างเดียวกับ js ถ้าต้องมีีui)
│                   ├── layout (โครงสร้างเดียวกับ js ถ้าต้องมีีui)
│                   ├── element (โครงสร้างเดียวกับ js ถ้าต้องมีีui)
│                   ├── site (โครงสร้างเดียวกับ js ถ้าต้องมีีui ตามตัวอย่างด้านล่าง)
│                   │      ├── main(เดิม คือ core)
│                   │      ├── saveasync ( ในนี้มีอะไรบ้าง)
│                   │      ├── font-loader
│                   │      ├── main(เดิม คือ core)
│                   │      ├── history
│                   │      ├── theme-config
│                   │      ├── rename (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── hide (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── unhide (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── set-homepage (อาจจะมีการเปลี่ยนทีหลัง)
│                   │      ├── rearrange-category  inject มาจาก  blog app(อาจจะมีการเปลี่ยนทีหลัง)
│                   ├── form(Form Editor)(v7.6)
│                   ├── email(Email Editor )(v7.6)



```

แบ่ง wysiwyg แต่ละประเภท

1. [WYSIWYG Element Editor](wysiwyg-type.md)
2. [WYSIWYG Layout Editor](wysiwyg-layout-editor.md)
3. [WYSIWYG Site Editor](wysiwyg-type.md)
4. [WYSIWYG Form Editor](wysiwyg-type.md) (เป็น element editor ตัวนึง หรือ ต้องแยกประเภทออกมา)
5. [WYSIWYG Email Editor](wysiwyg-type.md)
   [WYSIWYG widget]

---

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
