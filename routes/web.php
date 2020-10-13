<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/login','AdminController@loginAdmin' );
Route::post('/login','AdminController@postloginAdmin' );
Route::get('/logout', 'AdminController@logout');


    Route::get('/home', function () {
    return view('home');
});
Route::prefix('admin')->group(function(){

    Route::prefix('search')-> group(function () {
        Route::get('/', [
            'as' => 'search.getsearch',
            'uses' => 'CategoryController@getsearch'
        ]);
    });

    Route::prefix('user')-> group(function () {
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'UserController@index'
        ]);
        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'UserController@create'
        ]);
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'UserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=> 'user.edit',
            'uses'=>'UserController@edit'
        ]);
        Route::post('/update/{id}',[
            'as'=> 'user.update',
            'uses'=>'UserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'UserController@delete'
        ]);
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses'=> 'CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses'=> 'categoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses'=> 'categoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=> 'categories.edit',
            'uses'=>'categoryController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as'=> 'categories.delete',
            'uses'=>'categoryController@delete'
        ]);
        Route::post('/update/{id}',[
            'as'=> 'categories.update',
            'uses'=>'categoryController@update'
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses'=> 'MenuController@index'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses'=> 'MenuController@create'
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses'=> 'MenuController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=> 'menus.edit',
            'uses'=>'MenuController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as'=> 'menus.delete',
            'uses'=>'MenuController@delete'
        ]);
        Route::post('/update/{id}',[
            'as'=> 'menus.update',
            'uses'=>'MenuController@update'
        ]);

    });
    Route::prefix('sanpham')->group(function () {
        Route::get('/', [
            'as' => 'sanpham.index',
            'uses'=> 'ProductController@index'
        ]);
        Route::get('/create',[
           'as'=>'product.create',
            'uses'=>'ProductController@create'
        ]);
        Route::post('/store',[
            'as'=> 'product.store',
            'uses'=>'ProductController@store'
            ]);
        Route::get('/edit/{id}',[
            'as'=>'product.edit',
            'uses'=>'ProductController@edit'
        ]);
        Route::post('/update/{id}',[
            'as'=> 'product.update',
            'uses'=>'ProductController@update'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'product.delete',
            'uses'=>'ProductController@delete'
        ]);
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses'=> 'SliderAdminController@index'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses'=> 'SliderAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses'=> 'SliderAdminController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses'=> 'SliderAdminController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses'=> 'SliderAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses'=> 'SliderAdminController@delete'
        ]);

    });
    Route::prefix('setting')-> group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);
    });
    Route::prefix('intro')-> group(function () {
        Route::get('/', [
            'as' => 'intros.index',
            'uses' => 'IntroController@index'
        ]);
        Route::get('/create', [
            'as' => 'intros.create',
            'uses' => 'IntroController@create'
        ]);
        Route::post('/store', [
            'as' => 'intros.store',
            'uses' => 'IntroController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'intros.edit',
            'uses' => 'IntroController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'intros.update',
            'uses' => 'IntroController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'intros.delete',
            'uses' => 'IntroController@delete'
        ]);
    });

    Route::prefix('info')-> group(function () {
        Route::get('/', [
            'as' => 'infos.index',
            'uses' => 'InfoController@index'
        ]);
        Route::get('/create', [
            'as' => 'infos.create',
            'uses' => 'InfoController@create'
        ]);
        Route::post('/store', [
            'as' => 'infos.store',
            'uses' => 'InfoController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'infos.edit',
            'uses' => 'InfoController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'infos.update',
            'uses' => 'InfoController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'infos.delete',
            'uses' => 'InfoController@delete'
        ]);
    });
    Route::prefix('contact')-> group(function () {
        Route::get('/', [
            'as' => 'contacts.index',
            'uses' => 'ContactController@index'
        ]);
        Route::get('/create', [
            'as' => 'contacts.create',
            'uses' => 'ContactController@create'
        ]);
        Route::post('/store', [
            'as' => 'contacts.store',
            'uses' => 'ContactController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'contacts.edit',
            'uses' => 'ContactController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'contacts.update',
            'uses' => 'ContactController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'contacts.delete',
            'uses' => 'ContactController@delete'
        ]);
    });
});
