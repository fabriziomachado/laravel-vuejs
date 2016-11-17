<?php


use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/user', function () {
    \Illuminate\Support\Facades\Auth::LoginUsingId(2); // logar com o usuario client da silva
});

Route::get('/', function () {
    
    // \Illuminate\Support\Facades\Auth::LoginUsingId(2); // logar com o usuario client da silva
    
    // if( Gate::allows('access-admin') ){
    //     return "usuario com permissão de admin";
    // }else{
    //     return "usuario sem permissão de admin";
    // }
    
     return view('welcome');
     
});

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('admin.home');
});  

Route::group([
    'prefix' => 'admin', 
    'middleware' => 'can:access-admin', 
    'as' => 'admin.'
], function(){
    Route::get('/home', 'HomeController@index')->name('home');    
});
