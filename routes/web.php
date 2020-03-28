<?php

use Illuminate\Support\Facades\Route;

Route::get('subscribe-job-description', 'SubscribeController@subscribeJobDescriptionView');
Route::get('subscribe-name', 'SubscribeController@subscribeNameView');
Route::get('subscribe-email', 'SubscribeController@subscribeEmailView');

Route::post('subscribe-job-description', 'SubscribeController@subscribeJobDescription');
Route::post('subscribe-name', 'SubscribeController@subscribeName');
Route::post('subscribe-email', 'SubscribeController@subscribeEmail');

Route::get('subscribed', 'SubscribeController@subscribedView');

Route::get('verify-email', 'SubscribeController@verifyEmail');

Route::get('/', 'JobSearchController@jobs');