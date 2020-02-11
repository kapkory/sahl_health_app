<?php
$controller = "MessagesController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeMessage');
Route::get('/list',$controller.'listMessages');
Route::delete('/delete/{message}',$controller.'destroyMessage');
