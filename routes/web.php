<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreatureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [
    'uses' => 'App\Http\Controllers\Controller@getHome',
    'as' => 'home'
]);

Route::get('/about', [
    'uses' => 'App\Http\Controllers\Controller@getAbout',
    'as' => 'about'
]);

// ------------------------- User

// for future user things, i.e. profile or pets list
//Route::group(['prefix' => 'user'], function () {
//});

Route::get('/sign-in', [
    'uses' => 'App\Http\Controllers\UserController@getSignIn',
    'as' => 'get-sign-in'
]);

Route::post('/sign-in', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'sign-in'
]);

Route::get('/sign-up', [
    'uses' => 'App\Http\Controllers\UserController@getSignUp',
    'as' => 'get-sign-up'
]);

Route::post('/sign-up', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'sign-up'
]);

Route::post('/sign-out', [
    'uses' => 'App\Http\Controllers\UserController@postSignOut',
    'as' => 'sign-out'
]);

Route::get('/mycreatures', [
    'uses' => 'App\Http\Controllers\UserController@getMyCreatures',
    'as' => 'my-creatures'
]);

Route::get('/{user}', [
    'uses' => 'App\Http\Controllers\UserController@getProfile',
    'as' => 'profile'
]);
// ------------------------- End User
// --------------------------------------------------------------------------- Creatures

Route::get('/adopt/all', [
    'uses' => 'App\Http\Controllers\CreatureController@getAdoptable',
    'as' => 'adoptable',
]);

Route::post('/mycreatures/new', [
    'uses' => 'App\Http\Controllers\CreatureController@postAdoptCreature',
    'as' => 'adopt-creature',
]);

Route::post('/adopt/all', [
    'uses' => 'App\Http\Controllers\CreatureController@postCancelSellCreature',
    'as' => 'cancel-sell-creature',
]);

Route::post('/mycreatures', [
    'uses' => 'App\Http\Controllers\CreatureController@postSellCreature',
    'as' => 'sell-creature',
]);

Route::post('/name-change-ajax', [
    'uses' => 'App\Http\Controllers\CreatureController@postNameChangeAjax',
    'as' => 'name-change-ajax'
]);



// ajax routes
//Route::get('/postFeedCreature', [CreatureController::class, 'postFeedCreature']);

// --------------------- End Creatures

// -------------------------------------------------------------------------------------------------------------- Store

Route::get('/store/featured', [
    'uses' => 'App\Http\Controllers\StoreController@getStoreFeatured',
    'as' => 'featured'
]);

// --------------------------------------------------------------------------------------------- food
Route::get('/store/foods', [
    'uses' => 'App\Http\Controllers\StoreController@getStoreFoods',
    'as' => 'foods'
]);

Route::get('/store/add-food', [
    'uses' => 'App\Http\Controllers\StoreController@getAddFood',
    'as' => 'add-food'
]);

Route::post('/store/foods/all', [
    'uses' => 'App\Http\Controllers\StoreController@postPurchaseFood',
    'as' => 'purchase-food'
]);


// ---------------------- admin stuff

Route::post('/store/foods', [
    'uses' => 'App\Http\Controllers\StoreController@postAddFood',
    'as' => 'add-food-post'
]);

Route::post('/store/{id}', [
    'uses' => 'App\Http\Controllers\StoreController@postDeleteFood',
    'as' => 'delete-food'
]);

Route::get('/store/update/{id}', [
    'uses' => 'App\Http\Controllers\StoreController@getUpdateFood',
    'as' => 'update-food'
]);

Route::post('/store/update/{id}', [
    'uses' => 'App\Http\Controllers\StoreController@postUpdateFood',
    'as' => 'post-update-food'
]);
// --------------------------------------------------------------------------------------------- eggs

Route::get('/store/eggs', [
    'uses' => 'App\Http\Controllers\StoreController@getStoreEggs',
    'as' => 'eggs'
]);

//Route::get('/eggs', 'StoreController@getEggs'); // for ajax request

// --------------------------------------------------------------------------------------------- potions

Route::get('/store/potions', [
    'uses' => 'App\Http\Controllers\StoreController@getStorePotions',
    'as' => 'potions'
]);

Route::get('/store/housing', [
    'uses' => 'App\Http\Controllers\StoreController@getHousingItems',
    'as' => 'housing',
]);
// ------------------------- End Store

