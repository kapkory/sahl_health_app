<?php
$controller = "ReferralController@";
Route::get('/',$controller.'index');
Route::get('/list',$controller.'listReferrals');
