# Table of content
- [File structure](#file)
- [config.json](#config)


<div id='file' />

## File structure
 
 ```
 test1@test1:~/RVPanel$ tree
.
├── scss
│   └── app.scss
├── css
│   └── app.css
├── js
│   ├── app.js
├── img
│   ├── small_preview.png
│   ├── large_preview.png
├── config.json
```

<div id='config' />

## config.json
 
 
```json
{
	"id": "template_1",
	"name": "ชื่อ template 1",
	"category_id": "6",
	"description": "template เกี่ยวกับอะไร",
	"version": "1.0",
	"header": "2",
	"footer": "1",
  "menu": "17-main",
  "topmenu": "1",
	"banner": [
		"33",
        "42"
	],
	"pages": {
		"Home": {
            "rv-group-panel" : ["19"],
            "rv-group-list" : ["8"],
            "rv-group-pricing" : ["7"]
		},
		"Order Online": {
            "rv-group-pricing" : ["4","7"]
		}
	},
	"img": [
		"img/053-City.jpg"
	]
}
```
