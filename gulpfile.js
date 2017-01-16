/* global Elixir */

const gulp = require('gulp');
const elixir = require('laravel-elixir');
const webpack = require('webpack');
const WebpackDevServer = require('webpack-dev-server');
const webpackConfig = require('./webpack.config');
const webpackDevConfig = require('./webpack.dev.config');

require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

Elixir.webpack.config.module.loaders = [];

Elixir.webpack.mergeConfig(webpackConfig);
Elixir.webpack.mergeConfig(webpackDevConfig);

gulp.task('webpack-dev-server', () => {
    "use strict";
    let config = Elixir.webpack.config;
    new WebpackDevServer(webpack(config), {
        proxy: {
          '*': 'http://192.168.10.10:8000'
        },
        watchOptions:{
            poll: true,
            aggregateTimeout: 300
        },
        publicPath: config.output.publicPath,
        noInfo: true,
        stats: { colors: true }
    }).listen(8000, "0.0.0.0", () => {
            console.log("Bundling project...");
    });
});



elixir(mix => {
    
    mix.sass('./resources/assets/admin/sass/admin.scss')
       .copy('./node_modules/materialize-css/fonts/roboto', './public/fonts/roboto');
      // .webpack('./resources/assets/admin/js/app.js');
    
    gulp.start('webpack-dev-server');   
       
    mix.browserSync({
        host: '0.0.0.0',
        proxy: 'http://laravel-vuejs-fcm.c9users.io',
        port: 8082
    });
       
       //.webpack('app.js');
});
