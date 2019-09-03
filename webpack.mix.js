const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
   'public/public_index/css/bootstrap.css',
   'public/public_index/css/theme.css',
   'public/public_index/css/skins/skin-default.css',
   'public/public_index/css/plugins.css',
   'public/public_index/css/icont_font-awesome.css',
   'public/public_index/css/icon_themify.css',
   'public/public_index/css/plugins/owl.carousel.css',
   'public/public_index/css/plugins/owl.theme.default.css',
   'public/public_index/css/plugins/animate.css',
   'public/public_index/css/plugins/slick-theme.css',
   'public/public_index/css/plugins/slick.css'
], 'public/public_index/css/estilos_home.css')
.scripts([
   'public/public_index/js/jquery.min.js',
   'public/public_index/js/plugins/modernizr.js',
   'public/public_index/js/plugins/jquery.easing.js',
   'public/public_index/js/plugins/jquery-ui.min.js',
   'public/public_index/js/plugins/jquery.parallax.js',
   'public/public_index/js/plugins/bootstrap.bundle.min.js',
   'public/public_index/js/plugins/jquery.cookie.js',
   'public/public_index/js/plugins/owl.carousel.min.js',
   'public/public_index/js/plugins/slick.min.js',
   'public/public_index/js/plugins/jquery.countdown.min.js',
   'public/public_index/js/plugins/isotope.pkgd.min.js',
   'public/public_index/js/plugins/instafeed.min.js',
   'public/public_index/js/plugins/sticky-sidebar.js',
   'public/public_index/js/plugins/jquery.gmap.min.js',
   'public/public_index/js/theme.js'
], 'public/public_index/js/plugins_home.js');

mix.styles([
   'public/public_intranet/node_modules/morrisjs/morris.css',
   'public/public_intranet/node_modules/toast-master/css/jquery.toast.css',
   'public/public_intranet/css/style.min.css',
   'public/public_intranet/css/pages/dashboard1.css',
   'node_modules/dropify/dist/css/dropify.min.css',
   'node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'
], 'public/public_intranet/css/estilos_intranet.css')
.scripts([
   'public/public_intranet/node_modules/popper/popper.min.js',
   'public/public_intranet/js/perfect-scrollbar.jquery.min.js',
   'public/public_intranet/js/waves.js',
   'public/public_intranet/js/sidebarmenu.js',
   'public/public_intranet/js/custom.min.js',
   'public/public_intranet/node_modules/jquery-sparkline/jquery.sparkline.min.js',
   'public/public_intranet/node_modules/raphael/raphael-min.js',
   'public/public_intranet/node_modules/morrisjs/morris.min.js',
   'public/public_intranet/node_modules/toast-master/js/jquery.toast.js',
   'public/public_intranet/js/dashboard1.js',
   'node_modules/dropify/dist/js/dropify.min.js',
   'node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'
], 'public/public_intranet/js/plugins_intranet.js');

mix.scripts([
   'public/js/jquery.rut.js',
   'public/public_intranet/node_modules/datatables/jquery.dataTables.min.js',
   'public/public_intranet/node_modules/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js'
], 'public/js/plugins_general.js');






