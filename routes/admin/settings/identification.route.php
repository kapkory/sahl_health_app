<?php
$controller = "IdentificationController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeIdentification');
Route::get('/list',$controller.'listIdentifications');
Route::delete('/delete/{identification}',$controller.'destroyIdentification');