<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware' => ['auth', 'admin']], function () {
    // Authentication Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 

    // Password Reset Routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'HomeController@adminIndex')->name('home');

    Route::resource('veiculos', 'VeiculosController');

});

Route::get('/veiculos/{veiculo}', 'VeiculosController@show')->name('veiculos.show');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/meus-veiculos', 'VeiculosController@meusVeiculos')->name('veiculos.meusVeiculos')->middleware('auth');