<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');

Route::resource('books', 'BookController');
Route::group(['prefix' => trim(config('dbm.prefix')), 'namespace' => config('dbm.controller_namespace')], function () {
    //Database Table
    Route::get('/', 'DatabaseController@index');
    Route::get('table/builder/{name}', 'DatabaseController@index');
    //Crud
    Route::get('crud', 'CrudController@index');
    Route::get('login', 'CrudController@index');
    Route::get('crud/{table}/add-edit', 'CrudController@index');
    // Record
    Route::get('record/{table}', 'RecordController@index');
    Route::get('record/{table}/add-edit', 'RecordController@index');
    Route::get('record/{table}/add-edit/{id}', 'RecordController@index');
    //Permission
    Route::get('permission', 'PermissionController@index');
    //Backup
    Route::get('backup', 'BackupController@index');
    //Assets
    Route::get('assets', 'ManagerController@assets')->name('dbm.asset');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/analytics', 'AnalyticsController@index')->name('analytics.dashboard');

Route::get('/wait/{seconds}', function ($seconds) {
    sleep($seconds);
    return "Here ya go! Waited for $seconds seconds";
});

Auth::routes(['verify' => true]);

/*Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('verified');*/