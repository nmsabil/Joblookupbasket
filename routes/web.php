<?php

use Illuminate\Support\Facades\Route;

Route::get('subscribe-name', 'SubscribeController@subscribeNameView');
Route::get('subscribe-email', 'SubscribeController@subscribeEmailView');
Route::get('subscribe-job-description', 'SubscribeController@subscribeJobDescriptionView');

Route::post('subscribe-name', 'SubscribeController@subscribeName');
Route::post('subscribe-email', 'SubscribeController@subscribeEmail');
Route::post('subscribe-job-description', 'SubscribeController@subscribeJobDescription');

