
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap'); // gets jQuery (could also get Axios, and Lodash)
require('./flexslider/jquery.flexslider-min.js');
require('./hoverintent/hoverintent.min.js');

// Aris //
require('./aris/_foldable_sections.js');
require('./aris/_misc.js');
require('./aris/_navigation.js');
require('./aris/_navigation_mobile.js');
require('./aris/_tabs.js');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });
