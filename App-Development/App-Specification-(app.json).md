วิธีสร้างไฟล์ json เพื่อ register app เข้ากับ rvsitebuilder cms

```json
{
    "name": "Shop",
    "aliases": "Shop",  //display name
    "description": "",
    "keywords": [],
    "version": "1.0.1",
    "backendroute": "admin.blog.index",
    "frontendroute": "web.blog.index",
    "active": 1,
    "order": 0,
    "adminmenu": {
        "icon" : "path/to/icon.png",
        "appmenu" : {
            "enable":"true",
            "route":""   
        },
        "submenu": {
            "user": {
                "menuname":"custom user",
                "menuroute":""
            },
            "manage":{
                "menuname":"custom manager",
                "menuroute":""
            }
        }
    },
    "wys_plugin": {
        "blog": {
            "menu": {
                "insertmenu": {
                    "name":"New post",
                    "link":"/link/to/insert.html"
                },
                "leftmenu":{
                    "name":"New post",
                    "link":"/link/to/insert.html"
                }
            },
            "widget":{
                "name":"Lastest post",
                "section_grup":"social",
            }
        }
    },
    "table": ["prefix_aaaa_bbbb","prefix_aaaa_bbbb","prefix_aaaa_cccc"],
    "providers": [
        "Modules\\Blog\\Providers\\BlogServiceProvider"
    "files": [
        "start.php"
    ],
    "requires_app": {
            "app_wysiwyg": "1.5.6",
            "app_core": "1.0.0", 
    },
    "socialprovider":{
        
    }
}

```