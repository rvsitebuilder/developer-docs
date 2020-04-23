# Installation

- [Getting a developer license](#getting-a-developer-license)
- [Server Requirement](#server-requirement)
- [RVsitebuilder Docker](#rvsitebuilder-docker)
- [RVsitebuilder Web Installation](#rvsitebuilder-web-installation)
  - [Step 1 Get a domain name](#step-1-get-a-domain-name)
  - [Step 2 Domain configuration](#step-2-domain-configuration)
  - [Step 3 Create a database](#step-3-create-a-database)
    - [cPanel Control panel](#cpanel-control-panel)
    - [Direct Admin Control panel](#direct-admin-control-panel)
  - [Step 4 Install RVsitebuilder](#step-4-install-rvsitebuilder)
  - [Step 5 Once the installation is completed.](#step-5-once-the-installation-is-completed)
- [.env configuration](#env-configuration)

## Getting a developer license

You can install RVsitebuilder locally on your work station for developing purpose. Please register to [RVsitebuilder Register](https://dev.rvsitebuilder.com/) to get the developer license.

1. Register and Login to [RVsitebuilder](https://dev.rvsitebuilder.com/)
   ![DeveloperDashboard](images/Installation/Developer-license-index.png)

2. Go to [Developer Dashboard](https://dev.rvsitebuilder.com/devportal)
   ![DeveloperDashboard](images/Installation/Developer-license.png)

   When you come to `Developer Dashboard` :

   **Developer Token Auth** You can copy `My Developer Token Auth` go to `Verify License your website`,It will require to install locally.

## Server Requirement

Same as [**Laravel Installation**](https://laravel.com/docs/5.8/installation#server-requirements).

## RVsitebuilder Docker

Skip this step, if you want to install on [Laravel Homestead](https://laravel.com/docs/5.8/homestead), [Laravel Valet](https://laravel.com/docs/5.8/valet), or your own web server.

If you don’t have any web server locally, follow these steps.

- [Install for Windows 10](installation-for-windows10.md)
- [Install for MacOS](installation-for-macos.md)

## RVsitebuilder Web Installation

RVsitebuilder 7 can also install on every domain name. **If you have a Host Provider who provides you a control panel account by Control Panel Installation above. You don't have to install it by yourself and can ignore this.**

### Step 1 Get a domain name

Get a domain name on a server that already has RVsitebuilder license from your host provider or find one in our [hosting partners](https://rvsitebuilder.com/hosting-partner/) list.

### Step 2 Domain configuration

Make your domain configuration meet with the following requirements.

- Domain name must run on PHP7.1.3 or above.
- php extension: 'mysqlnd','pdo','gd','curl','iconv','mbstring','zip','posix_getpwuid','json'
- php ini config 'memory_limit' => 64M
- Firewall on your server doesn't block the following domains.  
  download.rvglobalsoft.com  
  Files.mirror1.rvsitebuilder.com

### Step 3 Create a database

Create a database, perform the following steps to create the MySQL database.

#### cPanel Control panel

1.  Click icon to create MySQL® databases.

    ![image](images/install_nocp/create-db-step1.png)

2.  In the New Database text box, enter a name for the database and click create database.

    ![image](images/install_nocp/create-db-step2.png)

3.  A new interface will appear. Click Go Back.

    ![image](images/install_nocp/create-db-step3.png)

4.  The new database appears in the Current Databases table.

    ![image](images/install_nocp/create-db-step4.png)

**After you created a database, add users to the database and configure their privileges. To create a new user account, perform the following steps:**

1. Enter a username in the Username text box.
2. Enter and confirm the new password in the appropriate text boxes.
3. Click Create User.

   ![image](images/install_nocp/create-db-step5.png)

4. Click Go Back to return to the main interface.

   ![image](images/install_nocp/create-db-step6.png)

**Add a user to a database. To add a user to a database, perform the following steps:**

1. In the Add User To Database section of the interface, select the desired user and database from the menus. Click Add.

   ![image](images/install_nocp/create-db-step7.png)

2. Select the checkboxes that correspond to the privileges that you wish to grant to the user. Click Make Changes. And click Go back to return to the main interface.

   ![image](images/install_nocp/create-db-step8.png)

3. Download RVsitebuilder Setup wizard

   1. Download RVsitebuilder Setup wizard https://files.mirror1.rvsitebuilder.com/download/rvsitebuilderinstaller/setup to your local computer.

   2. Click button `Upload`.

      ![image](images/install_nocp/upload1.png)

   3. A new interface will appear. Click selete and choose file download RVsitebuilder Setup wizard.

   4. Waiting a progress bar can show a complete state. 100% . And click Go back to "/home/mydomain/public_html"

      ![image](images/install_nocp/upload2.png)

   5. Right click and choose `Extract` the setup file to "/public_html"

      ![image](images/install_nocp/upload3.png)
      ![image](images/install_nocp/upload4.png)

   6. completed.

      ![image](images/install_nocp/upload5.png)

#### Direct Admin Control panel

1. Login to Direct Admin Control panel as End User.

2. Click Navigate to Account Manager > **MySQL Management**
   ![image](images/install_nocp/create-db-da-step1.png)

3. Click `Create New Database` Button
   ![image](images/install_nocp/create-db-da-step2.png)

   **After you click Create New Database.**

   - Type a name for Database.
   - Type a username for the database. The username can be the same as the DB name or a different one.
   - Type a Password for Database User.

4. Click `Create Database` Button to complete database creation

   ![image](images/install_nocp/create-db-da-step3.png)

5. The new database appears in the Current Databases table.

   **To add a user to a database, perform the following steps:**
   Select the database which the database user is assigned to
   ![image](images/install_nocp/create-db-da-step4.png)

   Click `Modify Privileges`
   ![image](images/install_nocp/create-db-da-step5.png)

   Select the checkboxes that correspond to the privileges that you wish to **Grant** to the user.Click `Change` button.
   ![image](images/install_nocp/create-db-da-step6.png)

6. Download RVsitebuilder Setup wizard

   6.1 Download [RVsitebuilder Setup wizard](https://files.mirror1.rvsitebuilder.com/download/rvsitebuilderinstaller/setup) to your local computer.

   **After you Download completed**

   - You will get a file named `rvsitebuilderinstaller%2Fsetup.zip`
   - You must change the file name to `rvsitebuilderinstallersetup.zip`.By simply removing **%2F**

   ![image](images/install_nocp/dowload.png)
   ![image](images/install_nocp/dowload-rename.png)

   6.2 Click Navigate to System Info & Files > **File Manager**

   ![image](images/install_nocp/upload-da-1.png)

   6.3 Click `public_html` directory.

   ![image](images/install_nocp/upload-da-2.png)

   6.4 Click `Upload File` Button.

   ![image](images/install_nocp/upload-da-3.png)

   6.5 A Popup interface will appear. Click selete and choose file download RVsitebuilder Setup wizard.

   Waiting a file upload show a complete state success.
   Click `Upload` Button.

   ![image](images/install_nocp/upload-da-4.png)

   6.6 Mouse hover **rvsitebuilderinstallersetup.zip** and choose `Extract` .

   ![image](images/install_nocp/upload-da-5.png)

   A Popup interface will appear. Extract **rvsitebuilderinstallersetup.zip** to `"/domains/yourdomain/public_html"`.

   Click `Extract` Button.

   ![image](images/install_nocp/upload-da-6.png)

   6.7 completed.
   ![image](images/install_nocp/upload-da-7.png)

### Step 4 Install RVsitebuilder

Install RVsitebuilder directly on your domain name.

1.  Call the setup.php script for your domain name on browser http://mydomainname.com/rvsitebuilder/setup.php

    ![image](images/install_nocp/Install-nocp-step1.png)

2.  Database and FTP setup

    ![image](images/install_nocp/Install-nocp-step2.png)

3.  website properties setup

    ![image](images/install_nocp/Install-nocp-step3.png)

4.  Accept agreement and install.

    ![image](images/install_nocp/Install-nocp-step4-1.png)
    ![image](images/install_nocp/Install-nocp-step4-2.png)

### Step 5 Once the installation is completed.

RVsitebuilder CMS is ready to [create website]((website-design.md#create-a-new-site) on your domain now!

![image](images/install_nocp/Install-nocp-step-login.png)

## .env configuration

Different between local and production

- Local
- Production
