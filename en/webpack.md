# Webpack

-   [Webpack.mix.js](#webpackmixjs)
-   [Webpack.mix.base.js](#webpackmixbasejs)
-   [Webpack.mix.admin.js](#webpackmixadminjs)
-   [Webpack.mix.user.js](#webpackmixuserjs)
-   [External JavaScript](#external-javascript)

If you generate app from Developer App, we create 3 default webpack files for you. It simplify Laravel Mix configurations and allow you to separate user and admin vendor.js to maximize website speed.

## Webpack.mix.js

## Webpack.mix.base.js

All webpack configuration

## Webpack.mix.admin.js

## Webpack.mix.user.js

## External JavaScript

As mention earlier, jQuery already loaded on the global object. You need to set external property on webpack configuration.

// TODO: correct webpack config

```js
external: jQuery;
```
