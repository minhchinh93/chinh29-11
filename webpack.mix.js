const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/assets/assets/js/demo.js', 'public/assets/assets/js')
    .postCss('resources/assets/assets/css/bootstrap.min.css', 'public/assets/assets/css')
    .postCss('resources/assets/assets/css/animate.min.css', 'public/assets/assets/css')
    .postCss('resources/assets/assets/css/light-bootstrap-dashboard.css', 'public/assets/assets/css')
    .postCss('resources/assets/assets/css/pe-icon-7-stroke.css', 'public/assets/assets/css')
    .postCss('resources/css/app.css', 'public/css', [
        //

    ]);