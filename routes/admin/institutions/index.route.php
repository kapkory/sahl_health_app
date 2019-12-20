<?php
$controller = "InstitutionController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeInstitution');
Route::get('/list',$controller.'listInstitutions');
Route::delete('/delete/{}',$controller.'destroyInstitution');
