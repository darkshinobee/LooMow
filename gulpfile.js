const elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
require('laravel-elixir-vue-2');
require('laravel-elixir-webpack-official');

/*
|--------------------------------------------------------------------------
| Elixir Asset Management
|--------------------------------------------------------------------------
|
| Elixir provides a clean, fluent API for defining some basic Gulp tasks
| for your Laravel application. By default, we are compiling the Sass
| file for your application as well as publishing vendor resources.
|
*/
// var elixir = require('laravel-elixir');
// var paths = {
//   'jquery': './vendor/bower_components/jquery/',
//   'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
// }

// elixir((mix) => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

// elixir(function(mix) {
//   var bootstrapPath = 'node_modules/bootstrap-sass/assets';
//   mix.sass('app.scss')
//     .copy(bootstrapPath + '/fonts', 'public/fonts')
//     .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
//     .webpack('app.js');
// });

elixir(function(mix) {
  var bootstrapPath = 'vendor/bower_components/bootstrap-sass/assets';
  var jQueryPath = 'vendor/bower_components/jquery';

  mix.sass('app.scss')
    .copy(bootstrapPath + '/fonts', 'public/fonts')
    .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
    .copy(jQueryPath + '/dist/jquery.min.js', 'public/js')
    .webpack('app.js');
});

// elixir(function(mix) {
//   // mix.sass("app.scss", 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
//   mix.sass("app.scss")
//   .copy(paths.bootstrap + 'stylesheets/', 'public/css/')
//   .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
//   .scripts([
//     paths.jquery + "dist/jquery.js",
//     paths.bootstrap + "javascripts/bootstrap.js"
//   ], './', 'public/js/app.js');
// });
