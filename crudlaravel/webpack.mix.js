let mix = require('laravel-mix');

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

/* Hot reload */

mix.browserSync('127.0.0.1:8000');

/* Compile assets */

mix.js('resources/assets/bootstrap/js/src/index.js', 'public/js')
   .sass('resources/assets/bootstrap/scss/bootstrap.scss', 'public/css');
