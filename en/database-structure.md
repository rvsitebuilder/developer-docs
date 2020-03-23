# Database Structure

-   [CMS features](#cms-features)
-   [Manage app](#manage-app)
-   [Slug](#slug)
-   [Page and Menu](#page-and-menu)
-   [Blog](#blog)
-   [Core setting](#core-setting)
-   [User](#user)
-   [Role and Permissions](#role-and-permissions)
-   [Widget and Meta](#widget-and-meta)
-   [Email](#email)
-   [Scheduled tasks](#scheduled-tasks)

## CMS features

Several tables contain Page, Blog, Menu, Header, footer, Slug, SEO, and etc. to build dynamic website.

![main](images/full_DB.png)

## Manage app

This table is manage all app in CMS.

![main](images/manage_app_table.png)

## Slug

Renaming page, post, and category slug will keep the old slug and automatically redirect to the new slug.

![main](images/slug_table.png)

## Page and Menu

![main](images/page_menu_table.png)

## Blog

![main](images/blog_table.png)

## Core setting

This table is used to store custom configuration from `Config Admin Interface` before creating config cache. Check [App Configuration](app-configuration.md) for more detail.

![Core_setting](images/core_setting_table.png)

## User

![user](images/users_table.png)

## Role and Permissions

![role_permission](images/role_permissions_table.png)

## Widget and Meta

Extending default table using meta table. Check [App Model](app-model.md) for more detail.

![meta](images/meta_table.png)

## Email

![email](images/email_table.png)

## Scheduled tasks

![task](images/task_table.png)
