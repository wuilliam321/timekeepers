const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss');
    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts');
    mix.styles([
        'resources/assets/vendor/bootstrap/css/bootstrap.css',
        'resources/assets/vendor/animate/animate.css',
        'resources/assets/vendor/font-awesome/css/font-awesome.css',
        'resources/assets/vendor/jqGrid/css/ui.jqgrid.css',
        'resources/assets/vendor/jqGrid/css/ui.jqgrid-bootstrap.css',
        'resources/assets/vendor/jqGrid/css/ui.jqgrid-bootstrap-ui.css',
    ], 'public/css/vendor.css', './');
    mix.webpack([
        'app.js',
        '../vendor/metisMenu/jquery.metisMenu.js',
        '../vendor/jqGrid/src/jquery.jqGrid.js',
        '../vendor/pace/pace.min.js',
    ], 'public/js/app.js');

});
