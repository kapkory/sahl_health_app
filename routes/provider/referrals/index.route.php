<?php
$controller = "ReferralController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeReferral');
Route::post('/register-as-agent',$controller.'registerAgent');
Route::get('/list',$controller.'listReferrals');
Route::delete('/delete/{referral}',$controller.'destroyReferral');
