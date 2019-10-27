<?php











// Les requet makhedmtx be Eloquent khedemt direct katjini 7esen. (GestionUsersController khedemt be Eloquent)

Route::get('/', function () {  return view('auth/login'); });

Auth::routes();

//Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//Gestion Users
Route::get('/dashboard/users', 'GestionUsersController@users')->name('loadusers')->middleware('checkusers');
Route::get('/dashboard/users/delete/{id}', 'GestionUsersController@deleteUsers')->name('delteuser')->middleware('checkusers');
Route::post('/dashboard/users/ajaxRequest', 'GestionUsersController@ajaxRequestPostUpdateUser')->middleware('checkusers');
Route::post('/ajaxUpdate', 'GestionUsersController@ajaxUpdate')->name('updateusers')->middleware('checkusers');
//Gestion Product
Route::get('/product/listProduct', 'ProductController@showProduct')->name('showProduct')->middleware('checkusers');
Route::get('/product/showall', 'ProductController@showProductall')->name('showall');//->middleware('checkusers')
Route::post('/product/add', 'ProductController@addProduct')->name('addProduct')->middleware('checkusers');
Route::get('/product/delete/{id}', 'ProductController@removeProduct')->name('deleteproduct')->middleware('checkusers');
Route::post('/product/update/', 'ProductController@updateProduct')->middleware('checkusers');
Route::post('/product/update_product/', 'ProductController@update_product')->name('update_product')->middleware('checkusers');
//Gestion Transaction
Route::get('/Transaction/show', 'TransactionController@showtransaction')->name('showtransaction');
Route::post('/Transaction/add_transaction/', 'TransactionController@add_transaction')->name('add_transaction');
Route::post('/Transaction/get_product_info/', 'TransactionController@get_product_info')->name('get_product_info');
Route::get('/Transaction/list', 'TransactionController@listtransaction')->name('listtransaction');
Route::get('/Transaction/delete/{id}', 'TransactionController@removeOrder')->name('removeOrder')->middleware('checkusers');

