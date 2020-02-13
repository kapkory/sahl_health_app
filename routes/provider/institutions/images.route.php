<?php
$controller = "ImagesController@";
Route::get('/',$controller.'index');
Route::post('upload',$controller.'storeInstitutionImage');
Route::get('/list',$controller.'listInstitutionImages');
Route::delete('/delete/{institutionimage}',$controller.'destroyInstitutionImage');
