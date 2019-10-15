# Database Structure

  
## CMS features  

Several tables contain Page, Blog, Menu, Header, footer, Slug, SEO, and etc. to build dynamic website.

![main](/en/images/main_DB_driagram.jpg)

### Old-slug

Renaming page, post, and category slug will keep the old slug and automatically redirect to the new slug.

## Core-setting

This table is used to store custom configuration from `Config Admin Interface` before creating config cache. Check [App Configuration](app-configuration.md) for more detail.

![Core_setting](/en/images/core_setting_main_DB_driagram.png)

## User

![user](/en/images/user_DB_driagram.jpg) 

## Role and Permissions

![role_permission](/en/images/role_permission_DB_driagram.jpg)

## Meta
Extending default table using meta table. Check [App Model](app-model.md) for more detail.
<!-- TODO: @pam ยังไม่ครบขาด user, and etc. ต้องรอ เจน แก้ไข app-model.md ก่อน -->

![meta](/en/images/meta_DB_driagram.jpg)

## Email

![email](/en/images/email_DB_diagram.png)

## Scheduled tasks

![task](/en/images/task_DB_driagram.jpg)