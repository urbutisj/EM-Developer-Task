let mix = require('laravel-mix');

mix
    .js('src/app.js', 'dist').setPublicPath('dist')
    .sass('src/scss/app.scss', 'dist').setPublicPath('dist');