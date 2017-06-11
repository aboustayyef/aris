const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/aris_main.js', 'public/js')
   .js('resources/assets/js/aris_admin.js', 'public/js')
   .sass('resources/assets/sass/aris_home.scss', 'public/css')
   .sass('resources/assets/sass/aris_admin.scss', 'public/css');