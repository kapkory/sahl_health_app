<?php
$controller = "InstitutionLevelController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeInstituitionLevel');
Route::get('/list',$controller.'listInstituitionLevels');
Route::delete('/delete/{instituitionlevel}',$controller.'destroyInstituitionLevel');
