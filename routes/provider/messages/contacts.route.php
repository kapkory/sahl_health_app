<?php
$controller = "ContactsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeContact');
Route::get('/list',$controller.'listContacts');
Route::delete('/delete/{contact}',$controller.'destroyContact');