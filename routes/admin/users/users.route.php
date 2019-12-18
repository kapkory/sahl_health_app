<?php
$controller = "UsersController@";
Route::get('/',$controller.'index');
Route::get('/list/{role}',$controller.'listUsers');
Route::get('/user/{id}/orders/list',$controller.'listUserOrders');