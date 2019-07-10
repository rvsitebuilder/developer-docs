# Webpack
  - [Webpack.mix.js](#Webpack.mix.js) 
  - [Webpack.mix.base.js](#Webpack.mix.base.js)
  - [Webpack.mix.admin.js](#Webpack.mix.admin.js) 
  - [Webpack.mix.user.js](#Webpack.mix.user.js)
  - [External JavaScript](#External-JavaScript) 

If you generate app from Developer App, we create 3 default webpack files for you. It simplify Laravel Mix configurations and allow you to separate user and admin vendor.js to maximize website speed.

<a name="Webpack.mix.js"></a>
## Webpack.mix.js


<a name="Webpack.mix.base.js"></a>
## Webpack.mix.base.js

All webpack configuration 


<a name="Webpack.mix.admin.js"></a>
## Webpack.mix.admin.js



<a name="Webpack.mix.user.js"></a>
## Webpack.mix.user.js


<a name="External-JavaScript"></a>
## External JavaScript

As mention earlier, jQuery already loaded on the global object. You need to set external property on webpack configuration.

// TODO: correct webpack config
```js
external: jQuery
```

