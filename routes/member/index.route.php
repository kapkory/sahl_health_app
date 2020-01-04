<?php
$controller = 'IndexController@';
Route::get('/',$controller.'index');
Route::get('nominate-dependant',$controller.'nominate');
Route::get('payment',$controller.'payment');
Route::post('request-payment',$controller.'requestPayment');
