# Installation

  - [Geting a developer license](#Geting-a-developer-license)
  - [Server Requirement](#Server-Requirement )
  - [RVsitebuilder Docker](#RVsitebuilder-Docker)  
  - [RVsitebuilder Wizard Install](#RVsitebuilder-Wizard-Install)
  - [.env configuration](#.env-configuration )
  
//TODO: @amarin How to install for developer

<a name="Geting-a-developer-license"></a>
## Geting a developer license

You can install RVsitebuilder locally on your work station for developing purpose. Please register to (https://dev.rvsitebuilder.com/) to get the developer license. 

1. Register to https://dev.rvsitebuilder.com/
2. Log in to https://dev.rvsitebuilder.com/
2. Go to ‘Developer Dashboard’ https://dev.rvsitebuilder.com/devportal
![DeveloperDashboard](/en/images/dev.rvsitebuilder.com_developer_dashboard.png)
3. Copy ’My Developer Token Auth’ It will require to install locally. 


<a name="Server-Requirement"></a>
## Server Requirement 

Same as Laravel, https://laravel.com/docs/master/installation#server-requirements. 

<a name="RVsitebuilder-Docker"></a>
## RVsitebuilder Docker 

Skip this step, if you want to install on [Laravel Homestead](https://laravel.com/docs/master/homestead), [Laravel Valet](https://laravel.com/docs/master/valet), or your own web server.

If you don’t have any web server locally, follow these steps. 

<a name="Installation"></a>

- [Install for Windows 10](installation-for-windows10.md)
- [Install for MacOS](installation-for-macos.md)

<a name="RVsitebuilder-Wizard-Install"></a>
## RVsitebuilder Wizard Install
<a name="Goto Admin"></a>

Please follow these steps: 

1 Open browser http://<local_ip>:8080

2 Waiting installation.
![DeveloperDashboard](/en/images/sb7_wizard_install.png)

3 System will redirect to admin page, you can login by following credential:
~~~
admin user: admin@admin.com
admin pass: 123456
~~~

![DeveloperDashboard](/en/images/sb7_admin_login.png)

4. Enter developer token at manage app.

 
 
 
<a name=".env-configuration"></a>
## .env configuration 

Different between local and production 

- Local
- Production  

 
