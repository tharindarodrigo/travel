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

    /**
     * User Account - after signIn
     */

    Route::group(array('before' => 'csrf'), function () {

        /*
             Change Password (POST)
         */

        Route::post('account/update-profile', 'AccountController@updateProfile');

//        Route::post('/profile/edit-user', array(
//            'as' => 'profile-edit-user-post',
//            'uses' => 'AccountController@postChangePassword',
//        ));

        //Change password

    });

    //Sign Out


    /*
        Sign out (GET)
    */

    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'AccountController@getSignOut',
    ));


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


        Route::group(array('before' => 'hotelier'), function () {
            /**
             * general
             */
            Route::group(array('prefix' => 'general'), function () {

                Route::post('cities/get-cities/{country_id}', 'CitiesController@getCitiesList');

                Route::group(array('before' => 'admin'), function () {
                    Route::resource('cities', 'CitiesController');
                    Route::resource('markets', 'MarketsController');
                    Route::resource('countries', 'CountriesController');

                });
            });

            /**
             * transportation
             */
            Route::group(array('prefix' => 'transportation'), function () {
                Route::resource('packages', 'TransportPackagesController');
                Route::resource('vehicles', 'VehiclesController');
            });

            /**
             * users
             */

            Route::group(array('prefix' => 'users'), function () {

                Route::get('{id}/activate', 'AccountController@activateUser');
                Route::get('{id}/deactivate', 'AccountController@deactivateUser');
                Route::get('{id}/send-activation-email', 'AccountController@sendActivationCode');
                Route::get('hoteliers', 'UsersController@getHoteliers');
                Route::get('hoteliers/{id}/permissions', 'UsersController@getHotelWithUserPermissions');
                Route::post('hoteliers/{id}/assign-permissions', 'UsersController@assignHotelPermissions');
                Route::post('change-role/{user_id}', 'UsersController@changeRole');
                Route::post('hoteliers/get-hotel-suggestions', 'UsersController@getHotelSuggestions');

                /**
                 * users/agents
                 */
                Route::group(array('prefix' => 'agents'), function () {
                    Route::get('/', 'UsersController@getAgents');
                    Route::get('changeMarket', 'UsersController@changeMarket');
                    Route::post('/{id}/update', 'UsersController@updateAgent');
                });

            });

            Route::resource('agents', 'AgentsController');
            Route::resource('users', 'UsersController');
            Route::resource('payments', 'PaymentsController');


            /**
             * -------------------------------------------------------------------------------------------------------------
             *  control-panel/agents
             *--------------------------------------------------------------------------------------------------------------
             */

            Route::resource('agents', 'AgentsController');

            /**
             * hotel
             */
            Route::group(array('prefix' => 'hotel'), function () {


                /**
                 * Room Specifications
                 */
                Route::resource('room_specifications', 'RoomSpecificationsController');

                /**
                 *  Meal Bases
                 */
                Route::resource('meal-bases', 'MealBasesController');

                /**
                 *  Room Facilities
                 */
                Route::resource('room-facilities', 'RoomFacilitiesController');

                /**
                 *  hotel facilities
                 */
                Route::resource('hotel-facilities', 'HotelFacilitiesController');

                /**
                 *  hotel categories
                 */
                Route::resource('hotel-categories', 'HotelCategoriesController');

                /**
                 *  star categories
                 */
                Route::resource('star-categories', 'StarCategoriesController');


            });
        });


        /**
         * -------------------------------------------------------------------------------------------------------------
         *  control-panel/hotel
         *--------------------------------------------------------------------------------------------------------------
         */
        Route::group(array('before' => 'hotelier'), function () {


            Route::group(array('prefix' => 'hotel'), function () {

                /**
                 *  Hotels
                 */
                Route::resource('hotels', 'HotelsController');

                /**
                 *  Allotments
                 */

                Route::resource('hotels.allotments', 'AllotmentsController');

                /**
                 *  Rates
                 */

                Route::resource('hotels.rates', 'RatesController');
                Route::post('hotels/{hotels}/rates/get-rates', 'RatesController@getRateData');
                Route::post('hotels/{hotels}/rates/update-rates', 'RatesController@updateRates');

                Route::resource('hotels.supplement-rates', 'SupplementRatesController');
                Route::post('hotels/{hotels}/supplement-rates/get-rates', 'SupplementRatesController@getRateData');
                Route::post('hotels/{hotels}/supplement-rates/update-rates', 'SupplementRatesController@updateSupplementRates');


                /**
                 *  Room Types
                 */
                Route::resource('hotels.room-types', 'RoomTypesController');


                /**
                 *  Hotel Profile
                 */
                Route::resource('hotel-profile', 'HotelProfilesController');

                /**
                 *  Hotel Cancellation Policies
                 */
                Route::resource('hotels.cancellation-policies', 'CancellationPoliciesController');


                Route::post('hotels/{hotel_id}/cancellation-policies/create', 'HotelsController@createCancellationPolicy');
                Route::get('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/edit', 'HotelsController@editCancellationPolicy');
                Route::put('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/update', 'HotelsController@updateCancellationPolicy');
                Route::delete('hotels/{hotel_id}/cancellation-policies/{cancellation_policy_id}/delete', 'HotelsController@deleteCancellationPolicy');

                //Route::resource('meal-bases', 'MealBasesController');
            });

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


        Route::get('image-uploads', array(
            'as' => 'post-image-upload',
            'uses' => 'ImageController@getUploadForm'
        ));
        Route::post('image-upload', array(
            'as' => 'get-image-upload',
            'uses' => 'ImageController@uploadImages'
        ));


        /*-------------------------------------------------------------------------------------------------------------
         *  End control-panel/hotel
         *-------------------------------------------------------------------------------------------------------------*/

    });

//=====================================================================================================================|
//    End Control Panel                                                                                                |
//=====================================================================================================================|

    Route::get('profile', 'UsersController@getProfile');
});

//
//Route::get('sign-up',function(){
//    return View::make('account.sign-up');
//});


Route::group(array('prefix' => 'account'), function () {
    Route::get('sign-up', 'AccountController@signUp');
    Route::post('create', 'AccountController@createAccount');
    Route::get('activate/{code}', 'AccountController@activateAccount');
    Route::get('sign-in', 'AccountController@getSignIn');
    Route::post('sign-in', 'AccountController@signIn');
    Route::get('forgot-password', 'AccountController@getForgotPassword');
    Route::post('forgot-password', 'AccountController@postForgotPassword');
    Route::get('recover/{code}', 'AccountController@recoverAccount');
    Route::post('recover-account/{code}', 'AccountController@postRecoverPassword');
});


Route::get('voucher/{id}', function ($id) {
    $voucher = Voucher::find($id);
    $pdf = PDF::loadView('emails/voucher', array('voucher' => $voucher));
    $pdf->setPaper('a4')->save(public_path() . '/temp-files/voucher.pdf');
    return $pdf->stream('abc.pdf');
});

Route::get('transport/{id}', function ($id) {
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/transport', array('booking' => $booking));
    $pdf->setPaper('a4')->save(public_path() . '/temp-files/transport.pdf');
    return $pdf->stream('abc.pdf');
});

//Route::get('transport-cancellation', function ($id) {
//    $booking = Booking::find($id);
//    $pdf = PDF::loadView('emails/transport-cancellation', array('booking' => $booking));
//    $pdf->setPaper('a4')->save(public_path() . '/temp-files/transport-cancellation.pdf');
//    return $pdf->stream('abc.pdf');
//});

Route::get('excursion/{id}', function ($id) {
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/excursion', array('booking' => $booking));
    $pdf->setPaper('a4')->save(public_path() . '/temp-files/excursion.pdf');
    return $pdf->stream('abc.pdf');
});

Route::get('excursion-cancellation/{id}', function ($id) {
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/excursion', array('booking' => $booking));
    $pdf->setPaper('a4')->save(public_path() . '/temp-files/excursion.pdf');
    return $pdf->stream('abc.pdf');
});

Route::get('cancellation-voucher/{id}', function ($id) {
    $voucher = Voucher::find($id);
    $pdf = PDF::loadView('emails/cancellation-voucher', array('voucher' => $voucher));
    $pdf->setPaper('a4')->save(public_path() . '/temp-files/cancellation-voucher.pdf');
    return $pdf->stream();

});


Route::get('booking/{id}', function ($id) {
//    $hotel_users = DB::table('users')->leftJoin('hotel_user', 'users.id', '=', 'hotel_user.user_id')
//        ->where('hotel_user.hotel_id', 1065)
//        ->get();
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/booking', array('booking' => $booking));

    return $pdf->stream();
});

Route::get('invoice/{id}', function ($id) {
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/invoice', array('booking' => $booking));

    return $pdf->stream();
});

Route::get('service-voucher/{id}', function ($id) {
    $booking = Booking::find($id);
    $pdf = PDF::loadView('emails/service-voucher', array('booking' => $booking));

    return $pdf->stream();
});

/*----------------------------Unauthenticated group---------------------------*/

Route::group(array('before' => 'guest'), function () {

    // CSFR protection group

    Route::group(array('before' => 'csrf'), function () {


    });


});


/***********************************************************************************************************************/
/***********************************************************************************************************************/

//=====================================================================================================================|
//    Front End                                                                                                    |
//=====================================================================================================================|

// index page

Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));


// Online Hotel Payments

Route::any('/payments-send', array(
    'as' => 'online-hotel-payments',
    'uses' => 'HsbcPaymentsController@sendPayment'
));


Route::get('/online-hotel-payments', function () {
    return View::make('payment_send');
});


Route::any('/send-payment-gateway', array(
    'as' => 'send-payment-gateway',
    'uses' => 'HsbcPaymentsController@sendToPaymentGateway'
));

Route::any('/payment-get', array(
    'as' => '/payment-get',
    'uses' => 'HsbcPaymentsController@paymentGet'
));

// currency rate create

Route::post('/sri-lanka/get-currency-rate', 'HomeController@createCurrency');

//Bookings
Route::get('bookings/cancel-booking', 'BookingsController@cancelBooking');
Route::post('/bookings/create-client', 'BookingsController@addClient');
Route::post('/bookings/destroy-client', 'BookingsController@destroyClient');
Route::post('/bookings/get-clients', 'BookingsController@getClientList');

Route::get('vouchers/{id}/cancel', 'VouchersController@cancelVoucher');

Route::resource('bookings', 'BookingsController');

Route::resource('bookings.custom-trip', 'CustomTripsController');
Route::resource('bookings.predefined-trip', 'PredefinedTripsController');
Route::resource('bookings.excursion-bookings', 'ExcursionBookingsController');

Route::resource('bookings.clients', 'ClientsController');
Route::resource('bookings.flightDetails', 'FlightDetailsController');


Route::get('/my-bookings', function () {
    return View::make('agent-bookings.bookings');
});


//Vouchers
Route::resource('bookings.vouchers', 'VouchersController');

Route::resource('transportation', 'TransportationController');

Route::get('/email-check', function () {
    $pdf = App::make('dompdf');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

//tourism details download

Route::get('/tdl-download', function () {
    $file = "images/TDL.jpg";
    $headers = array(
        'Content-Type: image/jpeg',
    );
    return Response::download($file, 'TDL.jpg', $headers);
});

//e-brocher download

Route::get('/ebrocher-download', function () {
    $file = "images/ebrocher.pdf";
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

// create excursion list

Route::get('excursion/sri-lanka/{excursion_type_name?}', array(
    'as' => 'excursion-list',
    'uses' => 'ExcursionController@excursionList'
));

// excursion details

Route::get('excursion/{country?}/{excursion_type_name?}/{excursion_name?}', array(
    'as' => 'excursion-details',
    'uses' => 'ExcursionController@excursionDetail'
));

// excursion filter

Route::any('sri-lanka/excursion/filter', array(
    'as' => 'excursion-filter',
    'uses' => 'ExcursionController@viewFilter'
));

// excursion transport

Route::post('sri-lanka/set_excursion_transport', array(
    'as' => 'excursion-set-transport',
    'uses' => 'ExcursionController@excursionSetTransport'
));

// excursion rate calculate

Route::post('sri-lanka/get_excursion_total', array(
    'as' => 'excursion-get-total',
    'uses' => 'ExcursionController@excursionGetTotal'
));

// excursion cart create

Route::post('/sri-lanka/excursion_add_to_cart', 'ExcursionController@excursionAddToCart');

// excursion cart item delete

Route::post('/sri-lanka/excursion_cart/delete', 'ExcursionController@excursionCartItemDelete');


//=====================================================================================================================|
/*------------------------- End Of Excursion List -------------------------------*/
//=====================================================================================================================|


//=====================================================================================================================|
/*------------------------- Tour List -------------------------------*/
//=====================================================================================================================|

// tour list

Route::any('tour/sri-lanka/{tour_name?}', array(
    'as' => 'tour-list',
    'uses' => 'TourController@tourList'
));

// tour details

Route::get('tour/{country?}/{tour_name?}/{tour_type_name?}', array(
    'as' => 'tour-details',
    'uses' => 'TourController@tourDetail'
));

// tour filter

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

// create predefined transport cart

Route::post('/sri-lanka/predefined_transport_add_to_cart', 'TransportPackageController@predefinedTransportCartCreate');

// delete item from predefined transport cart

Route::post('/sri-lanka/predefined_transport_cart/delete', 'TransportPackageController@predefinedTransportCartItemDelete');


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

// booking rate box create

Route::any('add-to-cart/{hotel_id}', 'CartController@addToCart');

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

// delete item from room rate box

Route::post('sri-lanka/get_room_rate_box/delete', 'HotelController@roomRateBoxDestroy');

// get hotel id for check hotel

Route::post('sri-lanka/get_cart_hot_id', 'HotelController@cartHotId');


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


