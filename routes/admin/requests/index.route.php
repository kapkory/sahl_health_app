<?php
$controller = "RequestsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeRequest');
Route::get('/list',$controller.'listRequests');
Route::delete('/delete/{request}',$controller.'destroyRequest');