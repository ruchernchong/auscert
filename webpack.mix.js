const {mix} = require('laravel-mix')

mix.browserSync({
    proxy: 'auscert.dev'
})

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/main.js', 'public/js')

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/style.scss', 'public/css')

mix.copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/data', 'public/data')

if (mix.inProduction()) {
    mix.version()
}