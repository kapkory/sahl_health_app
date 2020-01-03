<?php
$controller = "DependantsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeDependant');
Route::post('add',$controller.'addDependant');
Route::get('/list',$controller.'listDependants');
Route::delete('/delete/{dependant}',$controller.'destroyDependant');
