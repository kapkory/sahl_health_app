<?php
$controller = "InstitutionsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeInstitution');
Route::get('/list',$controller.'listInstitutions');
Route::delete('/delete/{institution_id}',$controller.'destroyInstitution');
