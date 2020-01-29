<?php
$controller = "FavoriteController@";
Route::get('/',$controller.'index');
Route::post('{institution_id}',$controller.'storeFavoriteInstitution');
Route::get('/list',$controller.'listFavoriteInstitutions');
Route::post('/delete/{favorite_institution}',$controller.'destroyFavoriteInstitution');
