<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware(['admin', 'auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('/peserta', 'UsersController', ['except' => ['create', 'store']]);
    Route::get('/peserta/download/{id}', 'UsersController@download')->name('peserta.file.download');
});

Route::resource('peserta', 'ParticipantsController')->middleware(['participant', 'auth']);
Route::post('/peserta/upload', 'ParticipantsController@uploadDocuments')->middleware(['participant', 'auth']);
Route::get('/file/{ldoc}', 'DocumentsController@download')->name('doc.download');


Route::get('/api/search','GroupController@search')->name('search');
