# ประเภท Editor

โครงสร้างไฟล์

```
└── wysiwyg/resource/js
│                   ├── admin
│                   ├── user
│                   ├── layout  //folder-name - 1 folder คือ 1 plugin เดิม
│                   │       ├── section-duplicate   ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Duplicate Section Layout Editor'
│                   │       ├── section-move  ซึ่งจากนี้ไปเรียกจะเรียกส่วนงานนี้ว่า 'Move Section Layout Editor'
│                   │       ├── section-delete
│                   │       ├── block-duplicate
│                   │       ├── block-move
│                   │       ├── block-delete
│                   │       ├── section-properties ตัวนี้ข้างในก็มีอีกหลาย tab อาจจะต้องแยกเป็น plugin ลงไปอีก
│                   │       ├── block-properties ตัวนี้ข้างในก็มีอีกหลาย tab อาจจะต้องแยกเป็น plugin ลงไปอีก
│                   │       ├── sidebar
│                   │       └── layout
│                   │               └── placeholder
│                   │                        ├── header
│                   │                        ├──header-email
│                   │                        ├── footer
│                   │                        └── footer-email
│                   ├── element
│                   ├── form-editor
└── wysiwyg/resource/views
│                   ├── user
```

แบ่งเป็น 3 ประเภท

1. [WYSIWYG Layout Editor](wysiwyg-layout-editor.md)
2. [WYSIWYG Element Editor](wysiwyg-type.md)
3. [WYSIWYG Form Editor](wysiwyg-type.md) (เป็น element editor ตัวนึง หรือ ต้องแยกประเภทออกมา)
   [WYSIWYG widget]
