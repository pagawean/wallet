<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('features/look/{video_id}', 'Api\FeaturesController@setLook')->name('api.features.set_look');
Route::get('features/comment/{video_id}', 'Api\FeaturesController@countComment')->name('api.features.count_comment');
