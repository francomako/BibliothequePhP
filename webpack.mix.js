// Importe Laravel Mix pour la gestion des assets
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps()
   .version()
   .options({ 
        //empêche Mix de traiter les chemins d'URL dans le CSS
        processCssUrls: false 
    });
