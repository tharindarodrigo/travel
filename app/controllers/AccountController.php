<?php

class AccountController extends \BaseController
{

    public function  getSignIn()
    {
        return View::make('account.sign_in_new');
    }

    public function  postSignIn()
    {
        $validator = Validator::make(Input::all(),

            array(
                'email' => 'required|email',
                'password' => 'required',
            )
        );

        if ($validator->fails()) {

            // Redirect to the sign in page
//            return Redirect::route('account-sign-in')
//                ->withErrors($validator)
//                ->withInput();

            $array = array(
                'validation' => false,
                'errors' => $validator->errors()->toArray()
            );

            return Response::json($array);

        } else {

            $remember = (Input::has('remember')) ? true : false;

            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'active' => 1
            ), $remember);

            if ($auth) {
                // Redirect to the intend page
//                return Redirect::intended('/');
                $array = array(
                    'validation' => true,
                    'success' => true,
                    'alert' => 'You are logged in'
                );

//                Entrust::hasRole('Agent') ? Session::put('market',Agent::)
                return Response::json($array);
            } else {
//                return Redirect::route('account-sign-in')
//                    ->with('global', 'Email/Password wrong, or account not activated');
                $array = array(
                    'validation' => true,
                    'success' => false,
                    'alert' => 'Wrong Email/Password, or account not activated'
                );
                return Response::json($array);
            }
        }

//        return Redirect::route('account-sign-in')
//            ->with('global', 'There was a problem signing in you');
//        $array = array('');
//
//        return Response::json()
    }

    public function getSignOut()
    {
        Auth::logout();
        return Redirect::route('index');
    }

    public function postSignOut()
    {

    }

    public function getCreate()
    {
        return View::make('account.sign_in_new');
    }

    public function postCreate()
    {

        // Your code here to handle a successful verification

        $validator = Validator::make(Input::all(),

            array(
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|max:50|email|unique:users',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
            )
        );

        if ($validator->fails()) {

//            return Redirect::route('account-create')
//                ->withInput()
//                ->withErrors($validator);
            $array = array(
                'validation' => false,
                'errors' => $validator->errors()->toArray()
            );

            return Response::json($array);

        } else {

            $first_name = Input::get('first_name');
            $last_name = Input::get('last_name');
            $email = Input::get('email');
            $password = Input::get('password');

            // Activation Code

            $code = str_random(60);


            $user = User::create(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => Hash::make($password),
                'code' => $code,
                'active' => 0
            ));



            if ($user) {

                // send email

                Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'first_name' => $first_name), function ($massage) use ($user) {
                    $massage->to($user->email, $user->first_name)->subject('Activate your account');
                });

                $array = array(
                    'success' => true,
                    'validation'=>true,
                    'alert' => 'Your account has been created! We have sent you an email to activate your account'
                );

                return Response::json($array);

            }

            $array = array(
                'success' => true,
                'alert' =>'Your account has been created! We have sent you an email to activate your account'
            );

            return Response::json($array);
        }

    }

    public function profileActive()
    {
        return View::make('pages.message');
    }

    public function getActivationEmail(){
        Session::flash('global','Your account has been created! We have sent you an email to activate your account');
        return View::make('pages.message');
    }

    public function getActivate($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0)->first();
        if ($user) {

            //update user to active state

            $user->active = 1;
            $user->code = '';

            if ($user->save()) {
                return Redirect::route('profile-activate')
                    ->with('global', 'Your account is activated..! Now you can sign in..!');
            }
        }

        return Redirect::route('profile-activate')
            ->with('global', 'Unable to activate your account.. please try again later');
    }

    public function getChangePassword()
    {
        return View::make('account.forgot');
    }

    public function postChangePassword()
    {

        $validator = Validator::make(Input::all(),

            array(
                'first_name' => 'max:50',
                'last_name' => 'max:50',
                'phone' => 'max:12',
                'old_password' => 'required',
                'password' => 'min:6',
                'password_conf' => 'same:password',
            )
        );

        if ($validator->fails()) {
            return Redirect::route('profile-edit-user-post')
                ->withErrors($validator);
        } else {

            $user = User::find(Auth::user()->id);

            $first_name = Input::get('first_name');
            $last_name = Input::get('last_name');
            $phone = Input::get('phone');
            $old_password = Input::get('old_password');
            $password = Input::get('password');

            if (Hash::check($old_password, $user->getAuthPassword())) {

                $user->password = Hash::make($password);

                if ($first_name) {
                    $user->first_name = $first_name;
                }
                if ($last_name) {
                    $user->last_name = $last_name;
                }
                if ($phone) {
                    $user->phone = $phone;
                }

                if ($user->save()) {
                    return Redirect::route('profile-activate')
                        ->with('global', 'Your password has been changed..');
                }
                return Redirect::route('profile-edit-user-post')
                    ->with('global', 'please check again');
            }
            return Redirect::route('profile-edit-user-post')
                ->with('global', 'Your password is wrong');
        }
        return Redirect::route('profile-edit-user-post')
            ->with('global', 'Your data could not be changed..');
    }

    public function getForgotPassword()
    {
        return View::make('account.forgot');
    }

    public function postForgotPassword()
    {

        $validator = Validator::make(Input::all(),

            array(
                'email' => 'required|email'
            )
        );

        if ($validator->fails()) {
            return Redirect::route('account-forgot-password')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where('email', '=', Input::get('email'));

            if ($user->count()) {

                $user = $user->first();

                // Generate a new code and password
                $code = str_random(60);
                $password = str_random(10);

                $user->code = $code;
                $user->password_temp = Hash::make($password);

                if ($user->save()) {
                    Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'first_name' => $user->first_name, 'password' => $password), function ($message) use ($user) {
                        $message->to($user->email, $user->first_name)->subject('Your new password');
                    });

                    return Redirect::route('account-password-reset')
                        ->with('global', 'we have sent you a new password by email');
                }
            }
        }

        return Redirect::route('account-forgot-password')
            ->with('global', 'Could not request new password');
    }

    public function getRecover($code)
    {
        $user = User::where('code', '=', $code)
            ->where('password_temp', '!=', '');

        if ($user->count()) {
            $user = $user->first();

            $user->password = $user->password_temp;
            $user->password_temp = '';
            $user->code = '';

            if ($user->save()) {
                return Redirect::route('account-password-reset-done')
                    ->with('global', 'Your account has been recovered and you can sign in with your new password');
            }

            return Redirect::route('account-create')
                ->with('global', 'Could not recover your account.');
        }
    }

}
