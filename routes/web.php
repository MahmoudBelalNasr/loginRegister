<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        //Frontend Routes
        Route::get('/', function () {
            return view('welcome');
        });
########################################################################3333####################################
        //USer Login and Registration
        Route::get('login', 'Auth\AuthController@login')->name('login')->middleware('guest');
        Route::post('post-login', 'Auth\AuthController@postLogin')->name('post.login')->middleware('guest');
        Route::get('register', 'Auth\AuthController@register')->name('register')->middleware('guest');
        Route::post('post-register', 'Auth\AuthController@postRegister')->name('post.register')->middleware('guest');
        Route::get('logout', 'Auth\AuthController@logout')->name('logout')->middleware('auth');

#################################################################################################################
        //login with facebook
        Route::get('/auth/{provider}', 'Auth\AuthSocialController@redirectToProvider')->name('provider.auth');
        Route::get('/auth/{provider}/callback', 'Auth\AuthSocialController@handleProviderCallback');

        Route::get('/home', function () {
            return view('home');
        })->name('home')->middleware('auth');
        //end of login and registration

###############################################################################################3#################
        //Dashboard routes
        Route::group(['prefix' => 'dashboard', 'namespace'=>'Dashboard'], function(){

            //Admin Login View
            Route::get('admin-login', 'DashboardController@login')->name('admin.login')->middleware('AdminGuest:admins');
            Route::post('admin-post-login', 'DashboardController@postLogin')->name('admin.post.login')->middleware('AdminGuest:admins');

            //Admin index and Logout    //middleware:guard
            Route::group(['middleware' => 'AuthAdmin:admins'] ,function (){
                Route::get('/index', 'DashboardController@index')->name('dashboard.index');
                Route::get('admin-logout', 'DashboardController@logout')->name('admin.logout');
            });
        });
});
