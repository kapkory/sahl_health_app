<?php
$controller = "ServiceController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeService');
Route::get('/list',$controller.'listServices');
Route::delete('/delete/{service}',$controller.'destroyService');