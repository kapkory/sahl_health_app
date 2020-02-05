<?php
$controller = "DependantsController@";
$controller1 = "PaymentsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeDependant');
Route::post('add',$controller.'addDependant');
Route::get('/list',$controller.'listDependants');
Route::delete('/delete/{dependant}',$controller.'destroyDependant');

Route::get('/payments/{code?}',$controller.'viewPayments');
Route::post('payments',$controller1.'payment');

