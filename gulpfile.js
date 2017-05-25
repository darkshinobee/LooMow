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

elixir(function(mix) {
  var bootstrapPath = 'vendor/bower_components/bootstrap-sass/assets';
  var jQueryPath = 'vendor/bower_components/jquery';

  mix.sass('app.scss')
    .copy(bootstrapPath + '/fonts', 'public/fonts')
    .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
    .copy(jQueryPath + '/dist/jquery.min.js', 'public/js')
    .webpack('app.js');
});
