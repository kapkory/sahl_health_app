<?php
$controller = "PackageCategoryController@";
Route::get('/',$controller.'index');
Route::post('/',$controller.'storePackageCategory');
Route::get('/list',$controller.'listPackageCategories');
Route::delete('/delete/{packagecategory}',$controller.'destroyPackageCategory');
