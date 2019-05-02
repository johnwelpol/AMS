<?php
Route::group([

    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthenticationController@login');
    Route::post('logout', 'AuthenticationController@logout');
    Route::post('refresh', 'AuthenticationController@refresh');
    Route::post('me', 'AuthenticationController@me');
    Route::post('user/landlord', 'UserController@addLandLord')->middleware(['jwt.auth']);

    Route::apiResource('user','UserController')->middleware(['jwt.auth']);
});