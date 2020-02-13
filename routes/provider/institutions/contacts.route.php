<?php
$controller = "InstitutionContactController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeInstitutionContact');
Route::get('/list',$controller.'listInstitutionContacts');
Route::delete('/delete/{institution_contact}',$controller.'destroyInstitutionContact');
