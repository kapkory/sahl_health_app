<?php
$controller = "ServicesController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeInstitutionService');
Route::get('/list',$controller.'listInstitutionServices');
Route::delete('/delete/{institutionservice}',$controller.'destroyInstitutionService');