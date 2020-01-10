<?php
$controller = "PackagesController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storePackage');
Route::get('/list',$controller.'listPackages');
Route::post('{id}/mark',$controller.'markStatus');
Route::delete('/delete/{package}',$controller.'destroyPackage');
