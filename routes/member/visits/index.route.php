<?php
$controller = "IndexController@";
Route::get('/',$controller.'index');
Route::get('visit/{visit_id}',$controller.'viewVisit');
Route::post('visit/{visit_id}/rate-visit',$controller.'rateVisit');
Route::get('/list',$controller.'listVisits');
