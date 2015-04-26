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


//=====================================================================================================================|
//    Front End                                                                                                    |
//=====================================================================================================================|


/*-------------------- Route for navbar --------------------*/


Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));


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
    'uses' => 'ContactController@message'
));

/*------------------------- Errors -------------------------*/

Route::get('/403', function () {
    return View::make('errors.403');
});


/*------------------------------ Hotel List --------------------------------*/

Route::group(array("prefix" => "type"), function () {

    Route::get('/hotel-list', array(
        'as' => 'hotel-list',
        'uses' => 'HotelController@index'
    ));

});


/*------------------------- /Hotel List -------------------------------*/



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

    /**
     * -------------------------------------------------------------------------------------------------------------
     *  control-panel/hotel
     *-------------------------------------------------------------------------------------------------------------*/

    Route::group(array('prefix' => 'hotel'), function () {
        /**
         *  Meal Bases
         */
        Route::resource('meal-bases', 'MealBasesController');
        Route::resource('room-facilities', 'RoomFacilitiesController');
        Route::resource('hotel-facilities', 'HotelFacilitiesController');
        //Route::resource('meal-bases', 'MealBasesController');
    });

    /*-------------------------------------------------------------------------------------------------------------
     *  End control-panel/hotel
     *-------------------------------------------------------------------------------------------------------------*/

});


//=====================================================================================================================|
//    End Control Panel                                                                                                |
//=====================================================================================================================|