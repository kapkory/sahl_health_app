<?php
$controller = "IndexController@";
Route::get('/',$controller.'index');
Route::get('visit/{visit_id}',$controller.'viewVisit');
Route::get('/list',$controller.'listVisits');
