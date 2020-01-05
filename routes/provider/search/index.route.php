<?php
$controller = 'IndexController@';
Route::get('/',$controller.'index');
Route::post('/',$controller.'searchMembers');
