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

mix.js(['resources/js/app.js', 'resources/js/lib/font-awesome.js'], 'public/js/app.js')
    .react()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .sass('resources/scss/custom.scss', 'public/css')
    .minify(['public/css/custom.css', 'public/css/app.css'])
    .webpackConfig(require('./webpack.config'));

mix.disableNotifications();

mix.browserSync('0.0.0.0:8000');

if (mix.inProduction()) {
    mix.version();
}
