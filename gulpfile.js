const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.styles([
        '../../../public/css/app.css',
        '../bower/datatables.net-bs/css/dataTables.bootstrap.css',
        '../bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
    ], 'public/css/all.css');

    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/jquery-mask-plugin/dist/jquery.mask.js',
        '../bower/jquery-validation/dist/jquery.validate.js',
        '../bower/datatables.net/js/jquery.dataTables.js',
        '../bower/datatables.net-bs/js/dataTables.bootstrap.js',
        '../bower/moment/min/moment.min.js',
        '../bower/moment/min/moment-with-locales.js',
        '../bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'helpers.js',
        'defaults.js'
    ], 'public/js/main.js');
});
