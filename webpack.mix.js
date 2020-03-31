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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix
    .sass('resources/assets/sass/common.scss', '../resources/assets/build/css')
    .sass('resources/assets/sass/admin.scss', '../resources/assets/build/css')
    .styles(
        [
            'resources/assets/build/css/common.css',
            'resources/assets/build/css/admin.css',
        ],
        'public/css/style.css'
    )
    .js('resources/assets/js/app.js', 'public/js')

