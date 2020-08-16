const mix = require('laravel-mix');

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

mix.disableSuccessNotifications()
    .setPublicPath('public')

    .js('resources/js/argon.js', 'public/js')
    .sass('resources/scss/argon.scss', 'public/css')

    .version()

    .copy('public', '../../public/vendor/microboard');
