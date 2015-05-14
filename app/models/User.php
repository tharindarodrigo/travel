<?php

use Zizaco\Entrust\HasRole;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array('email','first_name', 'last_name', 'password', 'password_temp', 'code', 'role_id' );

	use UserTrait, RemindableTrait, HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static function hasPermission($key){

		if(Auth::check()){
			$user = Auth::user();

			$x=3;

			if($key == 'admin'){
				$x = 1;
			}
			if($key == 'agent'){
				$x = 2;
			}


			if($user->user_categories_id == $x){
				return true;
			}
		}

		return false;

	}

    public function hotel(){
        return $this->hasMany('Hotel');
    }

}
