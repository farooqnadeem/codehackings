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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
.styles([
            'libs/blog-post.css',
            'libs/bootstrap.css',
            'libs/font-awesome.css',
            'libs/metisMenu.css',
            'libs/sb-admin-2.css',
            'libs/styles.css'
],'./public/css/libs.css')