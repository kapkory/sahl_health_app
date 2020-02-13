<?php
$controller = 'InstitutionController@';
Route::get('{institution_id}',$controller.'index')->where('id', '[0-9]+');
