const elixir = require('laravel-elixir');

require('laravel-elixir-vue');


elixir(mix => {
    
    mix.sass('./resources/assets/admin/sass/admin.scss')
       .copy('./node_modules/materialize-css/fonts/roboto', './public/fonts/roboto');
      // .webpack('./resources/assets/admin/js/app.js');
       
    mix.browserSync({
        host: '0.0.0.0',
        proxy: 'http://laravel-vuejs-fcm.c9users.io',
        port: 8082
    });
       
       
       //.webpack('app.js');
});
