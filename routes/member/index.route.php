<?php
$controller = 'IndexController@';
Route::get('/',$controller.'index');
Route::get('nominate-dependant',$controller.'nominate');
Route::post('verify-user',$controller.'verifyUser');
Route::post('generate-token',$controller.'generateToken');
Route::get('payment',$controller.'payment');
Route::post('request-payment',$controller.'requestPayment');
