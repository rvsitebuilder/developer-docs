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
  "$schema": "http://json.schemastore.org/template",
  "identity": "Contoso.Console.CSharp",
  "groupIdentity": "Contoso.Console",
  "author": "Contoso",
  "classifications": ["Common", "Console"],
  "name": "Contoso console template",
  "shortName": "contcon",
  "tags": {
    "language": "C#"
  },
  "sourceName": "MyTemplate",

  "primaryOutputs": [
	{
		"path": "newproject.csproj"
	},
	{
		"path": "newtextfile.txt",
		"condition": "(OperatingSystemKind == \"Linux\")"
	}
  ],
  "sources": [
    {
      "source": "./src/",
      "target": "./src/",
      "copyOnly": "**/*.txt",
      "exclude": "**/*.reg",
      "include": "**/*",
      "rename": {
        "file1": "file2"
      },
      "modifiers": [
        {
          "condition": "(IndividualAuth)",
          "exclude": "individual_auth.filelist"
        }
      ]
    },
    {
      "source": "./test/",
      "target": "./test/",
      "condition": "TestProject"
    }
  ],
```
