<?php
$controller = "IndexController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeVisit');
Route::get('/list',$controller.'listVisits');
Route::delete('/delete/{visit}',$controller.'destroyVisit');