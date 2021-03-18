## Google Login Setup for Built-in Channels

### Google Login Setup for Built-in Channels in your website

1. Google Login Setup for Built-in Channels requires [Google API Setup](https://support.rvglobalsoft.com/hc/en-us/articles/360012076374-How-to-set-Google-API) . If you don't setup it yet, please go setup by the guide first. If you did it already, you can continue to number 2.

2. After the Google API setup is completed, go to https://console.developers.google.com to select project you created for your website.

3. Click <b>Library</b>.

4. Search for **Google+ API**.

5. **Enable** Google+ API (Google+ API should be already enabled by setting Google API for Marketing (number 1). But if it’s not, just enable it again.)

6. At Google Developer Console page, click **Credentials**.

7. Select **OAuth Client ID** you created from number 1.

8. Google Developer Console page will display **Client ID** and **Client secret**.

9. Login as admin to your website.

10. Go to website editor -> Site -> System Pages -> Login, click on Login form to open Login setting. Enable **Google Login Setup**.

11. Insert **Client ID** and **Client secret** from number 8 to Google Login Setup, and click **OK** to complete setting.
 

If Google Login returns error when visitors try to login, please contact your host provider to allow google rule_id in ModSecurity by this guide. 