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
