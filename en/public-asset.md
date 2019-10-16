# Public Asset
  - [Resources vs Public Folder](#Resources-vs-Public-Folder)
  - [Define public asset ](#Define-public-asset ) 

<a name="Resources-vs-Public-Folder"></a>
## Resources vs Public Folder

It depends on your frontend development workflow.

- If you use webpack as a build tool for all your frontend development, keep all your asset in `app’s /resources`. 
- If you do not use webpack, keep your files in `app’s /public`.

```php
/packages/vendor-name/package-name/
                    ├── public
                    ├── resources
```

<a name="Define-public-asset"></a>
## Define public asset 

Your public asset keep on `app’s /public`. Define your public on `app's service provider` under `boot` method. While installing on the server, we will run `artisan vendor:publish --tag=public`. All your public will be copied to `/public/vendor/vendor-name/package-name/`.  

```php
public function boot() {
    $this->definePublic()  
} 

public function definePublic(){
    $this->publishes([__DIR__.'/../public' => public_path('vendor/vendor-name/package-name')], 'public');
}
```

On development server, you have 2 choices:

- Create symbolic link between your `app’s public` and `/public/vendor/vendor-name/package-name/`. 
- Use webpack to copy your `app’s public` to `/public/vendor/vendor-name/package-name/`. If you generate your app from RVsitebuilder app generator, we already configure it for you on `webpack.base.js`. 


```js
var pjson = require('./package.json')

if (!mix.inProduction()) {
    // Publish files on develop mode.
    // In production it is done by artisan vender:publish --tag=public.
    const fse = require('fs-extra')    
    mix.then(function () {
        console.log('==> Webpack finishes building.')
        let path = '../../../public/vendor/'+pjson.vendor+'/'+pjson.name
        fse.copy('public', path, err => {
            if (err) return console.error(err)
            console.log('===> Copy /public to '+path+' Done!')
        })
    })
}
```

 
