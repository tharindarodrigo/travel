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


    Route::get('/account/account-confirmation', array(
        'as' => 'activation-email',
        'uses' => 'AccountController@getActivationEmail'
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

    Route::get('/', function () {
        return View::make('control-panel.index');
    });

    Route::group(array('prefix' => 'general'), function () {

        Route::resource('cities', 'CitiesController');

        Route::post('cities/get-cities/{country_id}', 'CitiesController@getCitiesList');

        Route::resource('markets', 'MarketsController');
        Route::resource('countries', 'CountriesController');


    });

    Route::group(array('prefix' => 'transportation'), function () {
        Route::resource('packages', 'TransportPackagesController');
        Route::resource('vehicles', 'VehiclesController');

    });
    
    Route::resource('users', 'UsersController');
    Route::group(array('prefix' => 'users'), function () {

        Route::post('change-role/{user_id}', 'UsersController@changeRole');

    });


    Route::get('image-uploads', array(
        'as' => 'post-image-upload',
        'uses' => 'ImageController@getUploadForm'
    ));
    Route::post('image-upload', array(
        'as' => 'get-image-upload',
        'uses' => 'ImageController@uploadImages'
    ));


    /**
     * -------------------------------------------------------------------------------------------------------------
     *  control-panel/agents
     *--------------------------------------------------------------------------------------------------------------
     */

    Route::resource('agents', 'AgentsController');


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

    /**
     * -------------------------------------------------------------------------------------------------------------
     *  control-panel/excursions
     *--------------------------------------------------------------------------------------------------------------
     */

    Route::group(array('prefix' => 'excursions'), function () {
        Route::resource('excursion-types', 'ExcursionTypesController');
        Route::resource('excursion_transport_types', 'ExcursionTransportTypesController');
    });


    /*-------------------------------------------------------------------------------------------------------------
     *  End control-panel/hotel
     *-------------------------------------------------------------------------------------------------------------*/

});


//=====================================================================================================================|
//    End Control Panel                                                                                                |
//=====================================================================================================================|

/***********************************************************************************************************************/
/***********************************************************************************************************************/

//=====================================================================================================================|
//    Front End                                                                                                    |
//=====================================================================================================================|


Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));

//Bookings
Route::get('bookings/cancel-booking',  'BookingsController@cancelBooking');
Route::post('/bookings/create-client', 'BookingsController@addClient');
Route::post('/bookings/destroy-client', 'BookingsController@destroyClient');
Route::post('/bookings/get-clients', 'BookingsController@getClientList');

Route::resource('bookings', 'BookingsController');

Route::resource('bookings.clients', 'ClientsController');
Route::resource('bookings.flightDetails', 'FlightDetailsController');





Route::get('/my-bookings', function () {
    return View::make('agent-bookings.bookings');
});


//Vouchers
Route::resource('bookings.vouchers','VouchersController');

Route::resource('transportation', 'TransportationController');

Route::get('/email-check', function () {
    $pdf = App::make('dompdf');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

//tourism details download

Route::get('/tdl-download', function () {
    $file = public_path() . "/images/TDL.jpg";
    $headers = array(
        'Content-Type: image/jpeg',
    );
    return Response::download($file, 'TDL.jpg', $headers);
});

//e-brocher download

Route::get('/ebrocher-download', function () {
    $file = public_path() . "/images/ebrocher.pdf";
    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, 'ebrocher.pdf', $headers);
});

//auto complete route

Route::post('auto-complete', array(
    'as' => 'auto-complete',
    'uses' => 'HotelController@autoComplete'
));

//my testing page

Route::get('/11', function () {
    return View::make('pages.11');
});

/****** Route for about us ******/

Route::get('/about', function () {
    return View::make('pages.about');
});

/****** Route for tourism ******/

Route::get('/tourism-in-sri-lanka', array(
    'as' => 'tourism-in-sri-lanka',
    'uses' => 'PageController@tourismInSrilanka'
));

/****** Route srilanka advice ******/

Route::get('/sri-lanka-advice', array(
    'as' => 'sri-lanka-advice',
    'uses' => 'PageController@srilankaAdvance'
));

/****** Route for about-srilanka ******/

Route::get('/about-sri-lanka', array(
    'as' => 'about-sri-lanka',
    'uses' => 'PageController@aboutSrilanka'
));

/****** Route for FAQ ******/

Route::get('/faq', array(
    'as' => 'faq',
    'uses' => 'PageController@faq'
));

/****** Route for terms and conditions ******/

Route::get('/terms-and-conditions', array(
    'as' => 'terms-and-conditions',
    'uses' => 'PageController@termsAndConditions'
));

/****** Route for terms and conditions ******/

Route::get('/privacy-and-policy', array(
    'as' => 'privacy-and-policy',
    'uses' => 'PageController@privacyAndPolicy'
));

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

Route::get('/403', array(
    'as' => '403-message',
    'uses' => 'HomeController@view403'
));


//=====================================================================================================================|
/*------------------------- Excursion List -------------------------------*/
//=====================================================================================================================|

Route::get('excursion/sri-lanka/{excursion_type_name?}', array(
    'as' => 'excursion-list',
    'uses' => 'ExcursionController@excursionList'
));

Route::get('excursion/{country?}/{excursion_type_name?}/{excursion_name?}', array(
    'as' => 'excursion-details',
    'uses' => 'ExcursionController@excursionDetail'
));

Route::any('sri-lanka/excursion/filter', array(
    'as' => 'excursion-filter',
    'uses' => 'ExcursionController@viewFilter'
));

Route::post('sri-lanka/set_excursion_transport', array(
    'as' => 'excursion-set-transport',
    'uses' => 'ExcursionController@excursionSetTransport'
));

Route::post('sri-lanka/get_excursion_total', array(
    'as' => 'excursion-get-total',
    'uses' => 'ExcursionController@excursionGetTotal'
));


//=====================================================================================================================|
/*------------------------- End Of Excursion List -------------------------------*/
//=====================================================================================================================|


//=====================================================================================================================|
/*------------------------- Tour List -------------------------------*/
//=====================================================================================================================|

Route::any('tour/sri-lanka/{tour_name?}', array(
    'as' => 'tour-list',
    'uses' => 'TourController@tourList'
));

Route::get('tour/{country?}/{tour_name?}/{tour_type_name?}', array(
    'as' => 'tour-details',
    'uses' => 'TourController@tourDetail'
));

Route::any('sri-lanka/tour/filter', array(
    'as' => 'tour-filter',
    'uses' => 'TourController@viewFilter'
));

//=====================================================================================================================|
/*------------------------- End Of Tour List -------------------------------*/
//=====================================================================================================================|


//=====================================================================================================================|
/*------------------------- Transport  -------------------------------*/
//=====================================================================================================================|

//transport list

Route::any('transport-list', array(
    'as' => 'transport-list',
    'uses' => 'TransportPackageController@transportList'
));

// transport search

Route::any('sri-lanka/transport-search', array(
    'as' => 'transport-search',
    'uses' => 'TransportPackageController@viewSearch'
));

// create transport

Route::any('create-my-trip', array(
    'as' => 'create-my-trip',
    'uses' => 'TransportPackageController@createMyTrip'
));

// create transport cart

Route::post('/sri-lanka/get_transport_box', array(
    'as' => 'get-transport-box',
    'uses' => 'TransportPackageController@transportCart'
));

// delete transport rate box item

Route::post('/sri-lanka/get_transport_rate_box/delete', 'TransportPackageController@transportCartItemDelete');

// delete transport from cart

Route::post('/sri-lanka/transport_cart_rate_box/delete', 'CartController@transportCartDelete');

// Create transport map

Route::post('/sri-lanka/create_transport_map', 'TransportPackageController@transportMapCreate');


//=====================================================================================================================|
/*------------------------- End Of Transport  -------------------------------*/
//=====================================================================================================================|


//=====================================================================================================================|
/*------------------------------ Hotel List --------------------------------*/
//=====================================================================================================================|

// to get latitude and longitude of hotel details page

Route::post('get_map', array(
    'as' => 'get-map',
    'uses' => 'HotelController@getMap'
));

// get hotel list full map

Route::post('/get_hotel_list_full_map', 'HotelController@hotelListFullMap');

// get single hotel map

Route::post('/get_single_hotel_map', 'HotelController@hotelListSingleMap');

/************* Create Booking Cart ********************/

// booking cart

Route::get('/booking-cart', array(
    'as' => 'booking-cart-get',
    'uses' => 'CartController@bookingCart'
));

// Delete Hotel From Cart

Route::post('/get_cart_item/delete', 'CartController@cartItemDelete');

// Delete Room from cart

Route::post('/get_cart_single_item/delete', 'CartController@singleCartItemDelete');


/************* Grid View ********************/

Route::any('grid/view/{country}/{grid_city_or_acc}', array(
    'as' => 'hotel-grid-view',
    'uses' => 'HotelController@gridView'
));


/************* search link ********************/

Route::any('sri-lanka/search', array(
    'as' => 'hotel-search',
    'uses' => 'HotelController@viewSearch'
));

// Filtering part

Route::any('sri-lanka/filter', array(
    'as' => 'hotel-filter',
    'uses' => 'HotelController@viewFilter'
));


// Room rate box

Route::any('sri-lanka/get_room_rate_box', array(
    'as' => 'room-rate-box',
    'uses' => 'HotelController@getRoomRateBox'
));


Route::post('sri-lanka/get_room_rate_box/delete', 'HotelController@roomRateBoxDestroy');


// Star Category Rating

Route::post('/star_rating', array(
    'as' => 'star-rating',
    'uses' => 'HotelController@hotelList'
));


// Hotel ListR

Route::any('/{country?}/{city_name_OR_accommodation?}', array(
    'as' => 'hotel-list',
    'uses' => 'HotelController@hotelList'
));


// Single Hotel

Route::any('/{country?}/{city_name?}/{hotel_name?}/{asd?}', array(
    'as' => 'hotel-details',
    'uses' => 'HotelController@hotelDetail'
));


//=====================================================================================================================|
/*------------------------- End Of Hotel List -------------------------------*/
//=====================================================================================================================|


//=====================================================================================================================|
/*------------------------- Online Payment -------------------------------*/
//=====================================================================================================================|


// Online Hotel Payments

Route::any('/online-hotel-payments', array(
    'as' => 'online-hotel-payments',
    'uses' => 'HotelController@hotelDetail'
));

Route::get('/online-hotel-payments', function () {
    return View::make('payment.hotel_payment');
});