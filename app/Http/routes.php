<?php

get('/', 'DashboardController@dashboard');
get('dashboard', 'DashboardController@dashboard');

resource('sites', 'SiteController', ['only' => ['create', 'store', 'show', 'destroy']]);
get('sites/{sites}/regenerate', 'SiteController@regenerate');
get('sites/{sites}/delete', 'SiteController@destroy');

get('sites/{sites}/subscribers', 'SubscriberController@show');
get('sites/{sites}/subscribers/{resource_id}/disconnect', 'SubscriberController@disconnect');

resource('sites/{sites}/channels', 'ChannelController');
get('sites/{sites}/channels/{channels}/regenerate', 'ChannelController@regenerate');
get('sites/{sites}/channels/{channels}/delete', 'ChannelController@destroy');
get('sites/{sites}/channels/{channels}/toggle', 'ChannelController@toggle');
post('sites/{sites}/channels/{channels}/max', 'ChannelController@maxConnections');

Route::group(['prefix' => 'users'], function () {
    get('/', 'UsersController@index');
    get('{user}', 'UsersController@show');
    get('{user}/promote', 'UsersController@promote');
    get('{user}/ban', 'UsersController@ban');
});

Route::group(['prefix' => 'auth'], function () {
    get('login', 'AuthController@getLogin');
    post('login', 'AuthController@postLogin');

    get('register', 'AuthController@getRegister');
    post('register', 'AuthController@postRegister');

    get('logout', 'AuthController@getLogout');
});

get('settings', 'SettingsController@index');
post('settings', 'SettingsController@store');

post('api/push', 'APIController@push');
get('api/channel', 'APIController@channel');
get('api/channels', 'APIController@channels');