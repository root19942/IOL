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

Route::post('/outOfFavorie', function () {
	$favorie = APP\Favories::find(request('favorie_id'));
	$favorie->delete();
    return response()->json(['success' => 'true'], $this-> successStatus);
});


