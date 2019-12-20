<?php
$controller = 'IndexController@';
Route::get('/',$controller.'index');
Route::get('institution/create',$controller.'createInstitution');
