<?php
$controller = "IndexController@";
Route::get('/',$controller.'index');
Route::get('/list',$controller.'listMemberPayments');
