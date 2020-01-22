<?php
$controller = "ReferralsController@";
Route::get('/',$controller.'index');
Route::get('/list/{status}',$controller.'listReferrals');
