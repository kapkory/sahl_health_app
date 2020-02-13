<?php
$controller = "MessageController@";
Route::get('/{id}',$controller.'index');
Route::post('/{id}',$controller.'sendMessages');
