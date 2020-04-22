# Webpack
- [Webpack.mix.js](#webpackmixjs)
- [Webpack.mix.base.js](#webpackmixbasejs)
- [External JavaScript](#external-javascript)

If you generate app from Developer App, we create 2 default webpack files for you. It simplify Laravel Mix configurations and maximize website speed.

## Webpack.mix.js
- Set final path for images, fonts and etc.

- Automate `artisan vender:publish` while developing Images, fonts, and etc. that use `artisan vender:publish` to install which defined on your app's service provider, need to call copyDirectory here. **Webpack.base.js (line 116)** already set up to copy app's public folder over to site's public folder.Path relative to this **webpack.mix.js**

## Webpack.mix.base.js

All webpack configuration

## External JavaScript

As mention earlier, jQuery already loaded on the global object. You need to set external property on webpack configuration.

<!-- TODO: correct webpack config -->

```js
external: jQuery;
```
