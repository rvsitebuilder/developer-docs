# Using Vue.js

You can use frontend framework Vue.js and React.js etc.

- [Directory Structure](#directory-structure)
- [How to use](#how-to-use)
- [Creating Component](#creating-component)
- [Render Component](#render-component)
- [Webpack](#webpack)
- [Load Vue](#load-vue)
- [Vue Devtools](#vue-devtools)

## Directory Structure

Here is the example of file and directory structure for `/packages/vendor-name/package-name/resources`.

Create Laravel blade file and keep it in your `app’s /resources` folder.

```php
/packages/vendor-name/package-name/
                      ├── resources
                      │    ├── js
                      │    │  ├── admin
                      │    │  │   └── Example.js
                      │    │  └── components
                      │    │      └── ExampleComponent.vue
                      │    └── views
                      │       ├── admin
                      │       │   ├── layouts
                      │       │   │   └── app.blade.php
                      │       └── index.blade.php


```

<!-- TODO: @june ขยายความด้วย -->

## How to use

Here is an example of `views/admin/layouts/app.blade.php`

```php
@extends('admin.layouts.master')

@section('leftmenu')
	@include('admin.includes.leftmenu', ['package-name' => "vendor-name/package-name"])
@endsection

@push('package-styles')
    {{ style(@mixcdn('css/bootstrap.css', 'vendor/rvsitebuilder/wysiwyg')) }}
@endpush

@prepend('package-scripts')
    {{ script(@mixcdn('js/admin/bootstrap-vue-axios.js','vendor/rvsitebuilder/wysiwyg')) }}
@endprepend

```

## Creating Component

Includes a simple Vue component intended to acquaint you with the basic steps required to integrate a component into your application.

We choose **[Bootstrap Vue](https://bootstrap-vue.js.org)** because quickly integrate Bootstrap v4 components with Vue.js.

> {info} If you are not familiar with its concept. Check out the full [Bootstrap Vue](https://bootstrap-vue.js.org) to get started.

Let's turn our attention to the aforementioned `js/components/ExampleComponent.vue` file.

```javascript
<template>
    <b-container>
        <b-row>
            <b-col md="8" offset-md="2">
                <b-card>
                    <b-card-header>Example Component</b-card-header>
                    <b-card-body>I'm an example component!</b-card-body>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
  mounted() {
    console.log('Component mounted.');
  }
};
</script>
```

There are two main components. The first part is the `html template` and the second part is the section encapsulated by the `<script>` tag defines the component's logic.

This example uses one of Vue's lifecycle hooks (`mounted()`) to write a message to the browser console once the component has been rendered to the page DOM.

## Render Component

With that done, let's have a look at `js/admin/Example.js`:

```javascript
Vue.component(
  'example-component',
  require('../components/ExampleComponent.vue').default
);

const app = new Vue({
  el: '#app'
});
```

Loads an example Vue component creatively named `ExampleComponent.vue`.

This component is found in the `resources/js/components` directory. We'll return to this file in a moment, but if you're new to Vue just keep in mind that a Vue component allow you to create reusable HTML widgets which are typically enhanced with dynamic, JavaScript-driven behavior. In this chapter we'll create multiple Vue components while exploring different Vue capabilities.

Creates a new Vue instance, and identifies the root element of the Vue application. This root element serves as a cue to Vue that all Vue-related output will be rendered somewhere inside this element. This is often done simply by wrapping everything within your layout `<body>` with a `<div id="app">...</div>` element. As you'll soon see we'll rely on precisely this approach.

## Webpack

Even novice JavaScript developers are probably wondering how the `ExampleComponent.vue` file is going to be executed in the browser since it is not valid JavaScript. We're going to use Laravel Mix to compile the Vue code into standard JavaScript.

Head over `webpack.mix.js` file in your `app’s`.
Next,config path file to public

```js
mix.js(['resources/js/admin/Example.js'], 'js/admin/Example.js');
```

> Done! Now, all of the bullet items above are available to you, and it required exactly one method call.

Open a terminal and execute the following command.

```
$ npm run dev
```

At this point, simply create an HTML file, import your `js/admin/Example.js` bundle, and load the browser

## Load Vue

Next, create a new view named `index.blade.php`, placing it in your `resources/views` directory.

```php
@extends('vendor-name/package-name::admin.layouts.app')

@section('content')
  <div id="app">
    <example-component></example-component>
  </div>
@endsection

@push('package-scripts')
  {{ script(mix('js/admin/Example.js', 'vendor/vendor-name/package-name')) }}
@endpush
```

It defines the Vue root element (`#app`). Any referenced Vue components must be placed inside this element. We'll reference the example component inside a view which we'll create in just a moment.

> {warning} You should always use compound names when naming components, to prevent conflicts with current and forthcoming **HTML elements**. This is because **HTML elements** cannot be named using a compound word.

> Components should always be **Pascal-cased** (e.g. `ExampleComponent.vue` as opposed to `exampleComponent.vue` or `examplecomponent.vue`) or **kebab-cased** (e.g. `example-component.vue`). I'll return to other naming convention tips as warranted throughout the chapter It references the generated `Example.js` file

## Vue Devtools

You should install the **[vue-devtools](https://github.com/vuejs/vue-devtools)** browser extension. Extensions are available for Chrome, Firefox, and Safari, so you'll definitely want to use one of these browsers for Vue-related development.
