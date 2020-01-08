<?php
$controller = 'IndexController@';
Route::get('/',$controller.'index');
Route::post('/',$controller.'searchMembers');
Route::post('/confirm-visit',$controller.'confirmVisit');
Route::get('{id}',$controller.'viewVisit');
Route::post('confirm-bill/{id}',$controller.'confirmBill');
