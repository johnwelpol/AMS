<?php

$adminRoute = function () {
    //User Resource
    Route::post('user/landlord', 'UserController@addLandLord');
    Route::apiResource('user','UserController');
};


Route::group([
    'middleware' => ['jwt.auth']
], function () use ($adminRoute) {
    Route::post('logout', 'AuthenticationController@logout');
    Route::post('refresh', 'AuthenticationController@refresh');
    Route::post('me', 'AuthenticationController@me');
    Route::group(['middleware' => 'role:admin'],$adminRoute);
});



Route::post('login', 'AuthenticationController@login');
