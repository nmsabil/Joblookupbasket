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

Route::get('/', 'JobSearchController@getJobs');

Route::get('email-template-preview', 'SubscribeController@emailTemplatePreview');

Route::get('send-user-to-job', 'SubscribeController@sendUserToJob');

Route::group(['prefix' => 'admin'], function(){
    Route::get('login', 'AdminController@loginView')->name('admin.login');
    Route::post('login', 'AdminController@login');
    Route::get('show-users/{searchType}', 'AdminController@showAllUsersView')->name('show.users');

    Route::get('prepare-jobs-for-user/{userId}', 'AdminController@prepareJobsForUserView')->name('prepare.jobs.for.user');

    Route::post('send-jobs-email/{userId}', 'AdminController@sendJobsEmail')->name('admin.send.jobs.email');
});
