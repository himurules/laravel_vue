<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

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

Route::post('/categories/upsert', 'Admin\AdminController@upsert');
Route::delete('/categories/{category}', 'Admin\AdminController@destroy');
Route::post('/food-items/add', 'Admin\FoodItemController@store');
Route::get('/food-items/get/{itemId}', 'Admin\FoodItemController@show');
Route::post('/food-item/add-image', function (Request $request) {
    $file = $request->file('file');
    $filename    = $file->getClientOriginalName();
    $image_resize = Image::make($file->getRealPath());
    $image_resize->resize(165, 163);
    $image_resize->save(public_path('img/food_menu/'.$filename));
    return 'food_menu/'.$filename;
});
