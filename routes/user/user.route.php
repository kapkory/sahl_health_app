<?php
$controller = "UserController@";
Route::get('profile',$controller.'profile');
Route::post('profile',$controller.'updateInitialUser');
Route::get('state/{state}',$controller.'changeUserState');
Route::put('profile/{id}',$controller.'updateProfile');
Route::post('password',$controller.'updatePassword');