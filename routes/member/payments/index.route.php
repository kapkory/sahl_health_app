<?php
$controller = "PaymentController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeMemberPayment');
Route::get('/list',$controller.'listMemberPayments');
Route::delete('/delete/{memberpayment}',$controller.'destroyMemberPayment');