let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/wordpress-connector.js', dist + '/js')
    .sass(source + '/resources/assets/scss/wordpress-connector.scss', dist + '/css')

    .copyDirectory(dist + '/js', source + '/public/js')
    .copyDirectory(dist + '/css', source + '/public/css');
