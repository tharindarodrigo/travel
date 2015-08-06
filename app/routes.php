<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/*------------------------------ Sign in & Register --------------------------------*/


/*-------------------------Authenticated group-------------------------------*/

Route::group(array('before' => 'auth'), function () {

    Route::group(array('before' => 'csrf'), function () {

        /*
             Change Password (POST)
         */
        Route::post('/profile/edit-user', array(
            'as' => 'profile-edit-user-post',
            'uses' => 'AccountController@postChangePassword',
        ));


    });
    //Change password


    Route::get('account/change-password', array(
        'as' => 'account-change-password',
        'uses' => 'AccountController@getChangePassword'
    ));

    //Sign Out

    /*
        Change password (GET)
    */

    Route::get('/profile/edit-user', array(
        'as' => 'profile-edit-user',
        'uses' => 'AccountController@getChangePassword',
    ));

    /*
        My Properties
    */

    Route::get('/profile/my-properties', array(
        'as' => 'profile-my-properties',
        'uses' => 'AccountController@myProperties',
    ));

    /*
        Delete Properties
    */

    Route::post('/profile/my-properties-delete', array(
        'as' => 'profile-my-properties-delete',
        'uses' => 'AccountController@destroy',
    ));

    /*
        Sign out (GET)
    */

    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'AccountController@getSignOut',
    ));


});


/*----------------------------Unauthenticated group---------------------------*/

Route::group(array('before' => 'guest'), function () {

    // CSFR protection group

    Route::group(array('before' => 'csrf'), function () {

        /*
             Create account (POST)
         */

        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate',
        ));

        /*
            Sign in (POST)
        */

        Route::post('/account/sign-in', array(
            'as' => 'account-sign-in-post',
            'uses' => 'AccountController@postSignIn',
        ));

        /*
            Forgot password (POST)
        */

        Route::post('/account/forgot-password', array(
            'as' => 'account-forgot-password-post',
            'uses' => 'AccountController@postForgotPassword',
        ));


    });

    /*
          Forgot password (GET)
     */

    Route::get('/account/forgot-password', array(
        'as' => 'account-forgot-password',
        'uses' => 'AccountController@getForgotPassword',
    ));

    Route::get('/account/password-reset', array(
        'as' => 'account-password-reset',
        'uses' => 'AccountController@profileActive',
    ));

    Route::get('/account/password-reset-done', array(
        'as' => 'account-password-reset-done',
        'uses' => 'AccountController@profileActive',
    ));

    Route::get('/account/recover/{code}', array(
        'as' => 'account-recover',
        'uses' => 'AccountController@getRecover'
    ));

    /*
        Sign in (GET)
    */

    Route::get('/account/sign-in', array(
        'as' => 'account-sign-in',
        'uses' => 'AccountController@getSignIn',
    ));

    /*
        My Profile
     */

    Route::get('/profile/my-profile', array(
        'as' => 'profile-my-profile',
        'uses' => 'AccountController@profileActive',
    ));


    /*
        Create account (GET)
    */

    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate',
    ));

    Route::get('/profile/activate', array(
        'as' => 'profile-activate',
        'uses' => 'AccountController@profileActive',
    ));


    Route::get('/account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));

});


//=====================================================================================================================|
//    Control Panel                                                                                                    |
//=====================================================================================================================|

Route::group(array('prefix' => 'control-panel'), function () {

    /*
     * Dashboard
     */

    Route::get('/', function(){
        return View::make('control-panel.index');
    });

    Route::group(array('prefix' => 'general'), function(){

        Route::resource('cities', 'CitiesController');

        Route::post('cities/get-cities/{country_id}', 'CitiesController@getCitiesList');

        Route::resource('markets', 'MarketsController');
        Route::resource('countries', 'CountriesController');


    });

    Route::get('image-uploads',array(
        'as' => 'post-image-upload',
        'uses' => 'ImageController@getUploadForm'
    ));
    Route::post('image-upload',array(
        'as' => 'get-image-upload',
        'uses' => 'ImageController@uploadImages'
    ));


    /**
     * -------------------------------------------------------------------------------------------------------------
     *  control-panel/hotel
     *--------------------------------------------------------------------------------------------------------------
     */

    Route::group(array('prefix' => 'hotel'), function () {
        /**
         *  Allotments
         */

        Route::resource('hotels.allotments', 'AllotmentsController');

        /**
         *  Rates
         */

        Route::resource('hotels.rates', 'RatesController');
        Route::post('hotels/rates/get-rates', 'RatesController@getRateData');
        Route::post('hotels/{hotelid}/rates/update-rates', 'RatesController@updateRates');

        Route::resource('hotels.supplement-rates', 'SupplementRatesController');
        Route::post('hotels/supplement-rates/get-rates', 'SupplementRatesController@getRateData');
        Route::post('hotels/{hotelid}/supplement-rates/update-rates', 'SupplementRatesController@updateSupplementRates');


        /**
         *  Room Types
         */
        Route::resource('hotels.room-types', 'RoomTypesController');

        /**
         * Room Specifications
         */
        Route::resource('room_specifications', 'RoomSpecificationsController');

        /**
         *  Hotel Profile
         */
        Route::resource('hotel-profile', 'HotelProfilesController');

        /**
         *  Hotel Cancellation Policies
         */
        Route::resource('hotels.cancellation-policies', 'CancellationPoliciesController');

        /**
         *  Hotels
         */
        Route::resource('hotels', 'HotelsController');

        Route::post('hotels/{hotel_id}/cancellation-policies/create', 'HotelsController@createCancellationPolicy');
        Route::get('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/edit', 'HotelsController@editCancellationPolicy');
        Route::put('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/update', 'HotelsController@updateCancellationPolicy');
        Route::delete('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/delete', 'HotelsController@deleteCancellationPolicy');


        /**
         *  Meal Bases
         */
        Route::resource('meal-bases', 'MealBasesController');

        /**
         *  Room Facilities
         */
        Route::resource('room-facilities', 'RoomFacilitiesController');

        /**
         *  Room Types
         */
        Route::resource('hotels.room-types', 'RoomTypesController');

        /**
         *  hotel facilities
         */
        Route::resource('hotel-facilities', 'HotelFacilitiesController');

        /**
         *  hotel categories
         */
        Route::resource('hotel_categories', 'HotelCategoriesController');

        /**
         *  star categories
         */
        Route::resource('star-categories', 'StarCategoriesController');

        //Route::resource('meal-bases', 'MealBasesController');
    });

    /*-------------------------------------------------------------------------------------------------------------
     *  End control-panel/hotel
     *-------------------------------------------------------------------------------------------------------------*/

});


//=====================================================================================================================|
//    End Control Panel                                                                                                |
//=====================================================================================================================|

/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

//=====================================================================================================================|
//    Front End                                                                                                    |
//=====================================================================================================================|


Route::post('auto-complete', array(
    'as' => 'auto-complete',
    'uses' => 'HotelController@autoComplete'
));



Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));

Route::get('/11', function () {
    return View::make('pages.11');
});

/****** Route for about us ******/

Route::get('/about', function () {
    return View::make('pages.about');
});

/****** Route for contact us ******/

Route::get('/contact', array(
    'as' => 'get-contact',
    'uses' => 'ContactController@getContact'
));

Route::post('/contact', array(
    'as' => 'post-contact',
    'uses' => 'ContactController@postContact'
));


/************* Route to default page ********************/

Route::get('/message', array(
    'as' => 'default-message',
    'uses' => 'HomeController@message'
));

/*------------------------- Errors -------------------------*/

Route::get('/403', function () {
    return View::make('errors.403');
});


/*------------------------------ Hotel List --------------------------------*/

/************* Grid View ********************/

Route::any('grid/view/{country}/{grid_city_or_acc}', array(
    'as' => 'search',
    'uses' => 'HotelController@gridView'
));


/************* search link ********************/

Route::any('sri-lanka/search', array(
    'as' => 'search1',
    'uses' => 'HotelController@viewSearch'
));

// Filtering part

Route::any('sri-lanka/filter', array(
    'as' => 'search2',
    'uses' => 'HotelController@viewFilter'
));

Route::post('/star_rating', array(
    'as' => 'star-rating',
    'uses' => 'HotelController@hotelList'
));

/************* End Of Navbar Link ********************/

// Hotel List

Route::any('/{country?}/{city_name_OR_accommodation?}', array(
    'as' => 'hotel-list',
    'uses' => 'HotelController@hotelList'
));

// Single Hotel

Route::any('/{country?}/{city_name?}/{hotel_name?}', array(
    'as' => 'hotel-details',
    'uses' => 'HotelController@hotelDetail'
));

// to get latitude and longitude

Route::post('/get_map', array(
    'as' => 'get-map',
    'uses' => 'HotelController@getMap'
));

/*------------------------- End Of Hotel List -------------------------------*/
