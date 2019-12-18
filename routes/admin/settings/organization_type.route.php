<?php
$controller = "OrganizationTypeController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeOrganizationType');
Route::get('/list',$controller.'listOrganizationTypes');
Route::delete('/delete/{organizationtype}',$controller.'destroyOrganizationType');