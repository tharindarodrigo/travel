<?php

class AccountController extends \BaseController
{
    public function index()
    {
        return View::make('account.sign-in');
    }

    public function signUp()
    {
        return View::make('account.sign-up');
    }

    public function createAccount()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['role'] = Input::get('user_role');
        $data['country_id'] = Input::get('country');
        $data['password'] = Hash::make($data['password']);
        $data['code'] = str_random(60); //Activation code

        $user = User::create($data);
        if ($user) {

            $data['user_id'] = $user->id;

            if ($data['role'] = 'Agent') {
                $data['market_id'] = Market::where('market','All Market')->first()->id;
                $role = Role::where('name',$data['role'])->first();

                $user->attachRole($role);
                Agent::create($data);

                Mail::send('emails.auth.signup', array('first_name' => $data['first_name'], 'role' => $data['role']), function ($massage) use ($user) {
                    $massage->to($user->email, $user->first_name)->subject('Thank You for Signing Up');

                });

                Session::flash('global', 'Thank you for signing up with us as an ' . $data['role'] . '. We will contact you within 24 hours');
                return View::make('pages.message');
            }

            // send email

            Mail::send('emails.auth.activate', array('link' => URL::to('account/activate', $data['code']), 'first_name' => $data['first_name']), function ($massage) use ($user) {
                $massage->to($user->email, $user->first_name)->subject('Activate your account');
            });

            Session::flash('global', 'Your account has been created! We have sent you an email to activate your account');

            return View::make('pages.message');

        }

        return 'There was an error';


    }

    public function activateAccount($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0)->first();

        if ($user) {

            $user->active = 1;
            $user->code = '';

            if ($user->save()) {
                Session::flash('global', 'Your account is activated..! Now you can sign in..!');
                return View::make('pages.message');
            }
        }

        Session::flash('global', 'Unable to activate your account.. please try again later');
        return View::make('pages.message');
    }

    public function  getSignIn()
    {
        return View::make('account.sign-in');
    }

    public function  signIn()
    {
        $validator = Validator::make(Input::all(),

            array(
                'email' => 'required|email',
                'password' => 'required',
            )
        );

        if ($validator->fails()) {

            //Redirect to the sign in page
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

//            $array = array(
//                'validation' => false,
//                'errors' => $validator->errors()->toArray()
//            );

//            return Response::json($array);

        } else {

            $remember = (Input::has('remember')) ? true : false;

            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'active' => 1
            ), $remember);

            if ($auth) {

                if (Entrust::hasRole('Agent')) {
                    $market = Auth::user()->agent()->first()->market()->first();

                    Session::put('market', $market);
                }
                //Redirect to the intend page
                return Redirect::intended('/');
//                $array = array(
//                    'validation' => true,
//                    'success' => true,
//                    'alert' => 'You are logged in'
//                );

//                return Response::json($array);
            } else {
                return Redirect::back()
                    ->with('global', 'Email/Password wrong, or account not activated');
//                $array = array(
//                    'validation' => true,
//                    'success' => false,
//                    'alert' => 'Wrong Email/Password, or account not activated'
//                );
//                return Response::json($array);
            }
        }

    }

    public function getSignOut()
    {
        Session::forget('market');
        Auth::logout();
        return Redirect::route('index');
    }

    public function profileActive()
    {
        return View::make('pages.message');
    }

    public function getActivationEmail()
    {
        Session::flash('global', 'Your account has been created! We have sent you an email to activate your account');
        return View::make('pages.message');
    }

    public function updateProfile()
    {
        $validator = Validator::make(Input::all(),

            array(
                'first_name' => 'max:50',
                'last_name' => 'max:50',
                'current_password' => 'required',
                'new_password' => 'min:6',
                'password_again' => 'same:new_password',
            )
        );

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator);
        } else {

            $user = User::find(Auth::user()->id);

            $first_name = Input::get('first_name');
            $last_name = Input::get('last_name');
            $old_password = Input::get('current_password');
            $password = Input::get('new_password');

            if (Hash::check($old_password, $user->getAuthPassword())) {


                $user->password = Hash::make($password);

                if ($first_name) {
                    $user->first_name = $first_name;
                }
                if ($last_name) {
                    $user->last_name = $last_name;
                }

                if ($user->save()) {
                    Session::flash('global', 'Your credential have been updated');
                    return Redirect::back();
                }
                return Redirect::route('profile-edit-user-post')
                    ->with('global', 'please check again');
            }
            return Redirect::back()
                ->with('global', 'Your password is wrong');
        }

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
            return Redirect::back()
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
                    Mail::send('emails.auth.forgot', array('link' => URL::to('account/recover', $code), 'first_name' => $user->first_name, 'password' => $password), function ($message) use ($user) {
                        $message->to($user->email, $user->first_name)->subject('Your new password');
                    });

                    Session::flash('global', 'we have sent you a new password by email');
                    return View::make('pages.message');
                }
            }
        }

        return Redirect::route('account-forgot-password')
            ->with('global', 'Could not request new password');
    }

    public function recoverAccount($code)
    {
        $user = User::where('code', '=', $code)
            ->where('password_temp', '!=', '');

        if ($user->count()) {
            $user = $user->first();

            $user->password = $user->password_temp;
            $user->password_temp = '';
            $user->code = '';

            if ($user->save()) {
                Session::flash('global', 'Your account has been recovered and you can sign in with your new password we emailed you just now');
                return View::make('pages.message');
            }

            return Redirect::route('account/sign-in')
                ->with('global', 'Could not recover your account.');
        }
    }

}
