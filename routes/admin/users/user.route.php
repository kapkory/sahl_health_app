<?php
$controller = "UserController@";
Route::get('/{id}',$controller.'index');
Route::post('/',$controller.'storeUser');
Route::post('active/{id}',$controller.'active');
Route::delete('delete/{id}',$controller.'deleteUser');
