# Webpack


If you generate app from Developer App, we create 3 default webpack files for you. It simplify Laravel Mix configurations and allow you to separate user and admin vendor.js to maximizell website speed.


## Webpack.mix.js



## Webpack.mix.base.js

All webpack configuration 



## Webpack.mix.admin.js




## Webpack.mix.user.js



## External JavaScript

As mention earlier, several libraries already loaded on the global object. To minimize your app JavaScript file size, you can set external property on webpack configuration.

// TODO: correct webpack config
```js
external: JQuery, jQuery-ui, jstree, uikit 
```

