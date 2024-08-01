<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('province', 'ApiController@getProvince'); //ROUTE API UNTUK Province
Route::get('city', 'ApiController@getCity'); //ROUTE API UNTUK CITY
Route::get('district', 'ApiController@getDistrict'); //ROUTE API UNTUK DISTRICT
Route::get('price', 'ApiController@getProductPrice'); //ROUTE API UNTUK PRODUCT PRICE
Route::get('contact-group/{id}','API\ContactGroupController@getContact' ); //ROUTE API UNTUK CONTACT LIST BERDASARKAN GROUP
/**
 * URL API untuk Member
 * http://[IP Address]/wedding/public/api/member/method
 *
 */
Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        /**
         * Logout dari sistem
         */
        Route::get('logout', 'API\UserController@logout');
        /**
         * Profil Pribadi User
         * 
         */
        Route::get('profile', 'API\UserController@profile');
        Route::post('update/profile', 'API\UserController@updatePassword');

        /**
         * As Customer
         * 
         */
        Route::get('get/events', 'API\EventController@getEvents'); // data semua event yg dibuat
        Route::get('get/event/{id}/detail', 'API\EventController@getDetailEvent'); // data event detail
        Route::post('post/event/{id}/update', 'API\EventController@updateDetailEvent'); // update data event details
        Route::get('get/guest/{id}/event', 'API\EventController@getGuestEvent'); // data tamu yang diundang
        Route::post('post/add/guest/{id}/event', 'API\EventController@addGuestEvent'); // menambah tamu yang diundang
        Route::get('/delete/{invite_id}/guest', 'API\EventController@deleteGuest'); // menghapus invite id


        /**
         * As Guest
         *
         */
        Route::get('get/invitations', 'API\EventController@getInvitations'); // data semua invitation
        Route::post('attend/{code_event}', 'API\EventController@attending'); // attend

        Route::post('post/wishes/{id}/event','API\EventController@sentWishes'); // memberikan ucapan user
        Route::get('get/wishes/{id}/event','API\EventController@getWishes'); // ambil data ucapan user

        Route::get('/get/wishes/list','API\EventController@getWishesList');
        



    });
});
