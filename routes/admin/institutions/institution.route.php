<?php
$controller = 'InstitutionController@';
Route::get('{institution_id}',$controller.'index');
Route::post('{institution_id}/{status}',$controller.'setStatus');
