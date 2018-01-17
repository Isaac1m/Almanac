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



Route::get('/', 'DocumentsController@index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('document/create', 'DocumentsController@create'
    )->name('documents.create');
});


Route::get('document/{document}', 'DocumentsController@show')->name('documents.show');
Route::get('documents', 'DocumentsController@index')->name('documents.index');
Route::get('documents/latest', 'DocumentsController@latest')->name('documents.latest');
Route::get('documents/popular', 'DocumentsController@most_read')->name('documents.popular');
Route::post('search', 'SearchController@search')->name('search');
Route::get('faculties', 'FacultiesController@index')->name('faculties.index');





Route::group(['middleware' => ['auth']], function() {
    Route::post('document', 'DocumentsController@store')->name('documents.store');
    Route::get('document/{document}/edit', 'DocumentsController@edit')->name('documents.edit');
    Route::patch('document/{document}', 'DocumentsController@update')->name('documents.update');
    Route::delete('document/{document}', 'DocumentsController@destroy')->name('documents.destroy');
    Route::get('faculty/create', 'FacultiesController@create')->name('faculties.create');
    Route::post('faculty', 'FacultiesController@store')->name('faculties.store');
    Route::get('faculty/{faculty}/edit', 'FacultiesController@edit')->name('faculties.edit');
    Route::patch('faculty/{faculty}','FacultiesController@update')->name('faculties.update');
    Route::delete('faculty/{faculty}', 'FacultiesController@destroy')->name('faculties.destroy');
    Route::get('department/create', 'DepartmentsController@create')->name('depts.create');
    Route::post('department', 'DepartmentsController@store')->name('depts.store');
    Route::get('department/{department}/edit', 'DepartmentsController@edit')->name('depts.edit');
    Route::patch('department/{department}', 'DepartmentsController@update')->name('depts.update');
    Route::delete('department/{department}', 'DepartmentsController@destroy')->name('depts.destroy');
    
});

Route::get('faculty/{faculty}', 'FacultiesController@show')->name('faculties.show');
Route::get('department/{department}', 'DepartmentsController@show')->name('depts.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
