<?php
$controller = "ContactsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeContactUs');
Route::get('/list',$controller.'listContactuses');
Route::delete('/delete/{contactus}',$controller.'destroyContactUs');