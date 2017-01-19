# Laravel PHP Framework


# Configurando inline e hot do webpack-dev-server

http://192.168.10.10:8000

- $ gulp watch

- Rodar o servidor php
- Acessar bno browser: http://laravel-vuejs-fcm.c9users.io:8082/


# Esquema do BrowserSync -> Webpack-server -> php

\0/  ->  http://laravel-vuejs-fcm.c9users.io:8082
     ->  0.0.0.0:8081
     ->  0.0.0.0:8080 (php interno do c9)




   62  npm unistall webpack
   63  npm uninstall webpack
   65  npm update
   73  npm install babel-plugin-add-module-exports --save-dev
   
   75  npm install babel-plugin-transform-runtime --save-dev
   
   $ npm install vue-loader@^8.5.3 vue-hot-reload-api@^1.3.3 vue-html-loader vue-style-loader --save-dev                           
npm WARN peerDependencies The peer dependency babel-








[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
