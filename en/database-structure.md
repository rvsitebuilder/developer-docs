# Database Structure

  
## CMS features  

Several tables contain Page, Blog, Menu, Header, footer, Slug, SEO, and etc. to build dynamic website.

![main](images/main_DB_driagram.jpg)

### Old-slug

Renaming page, post, and category slug will keep the old slug and automatically redirect to the new slug.

## Core-setting

This table is used to store custom configuration from `Config Admin Interface` before creating config cache. Check [App Configuration](app-configuration.md) for more detail.

![Core_setting](images/core_setting_main_DB_driagram.png)

## User

![user](images/user_DB_driagram.jpg) 

## Role and Permissions

![role_permission](images/role_permission_DB_driagram.jpg)

## Meta
Extending default table using meta table. Check [App Model](app-model.md) for more detail.

![meta](images/meta_DB_driagram.jpg)

## Email

![email](images/email_DB_diagram.png)

## Scheduled tasks

![task](images/task_DB_driagram.jpg)