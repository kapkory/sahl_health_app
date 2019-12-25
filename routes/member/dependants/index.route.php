<?php
$controller = "DependantsController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storeDependant');
Route::get('/list',$controller.'listDependants');
Route::delete('/delete/{dependant}',$controller.'destroyDependant');