<?php

use Zizaco\Entrust\HasRole;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    protected $fillable = array('email', 'first_name', 'last_name', 'password', 'password_temp', 'code', 'role_id');

    public static $rules = [
        'first_name' => 'required|max:50',
        'last_name' => 'required|max:50',
        'email' => 'required|max:50|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
        'use_as' => 'required|numeric|between:1,3',
        'company' => 'required_if:user_role,2,3',
        'telephone'=> 'required_if:user_role,2,3',
        'fax'=> 'numeric',

    ];

    use HasRole, UserTrait, RemindableTrait;

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


    public static function getHoteliers()
    {
//        return $users = DB::table('users')
//            ->leftJoin('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')
//            ->where('assigned_roles.role_id', Role::where('name', 'Hotelier')->first()->id)
//            ->get();

        return $users = User::with('role')->where('role.name','=','Hotelier')->get();
    }

    public static function getAgents()
    {
//        return $agents = User::leftJoin('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')
//            ->where('assigned_roles.role_id', Role::where('name', 'Agent')->first()->id)
//            ->get();

    }


    public static function getAgentOfUser($id)
    {
        $user_agent = DB::table('agent_user')->where('user_id', $id)->first();
        if ($user_agent) {
            return $user_agent;
        }

        return false;
    }

    public static function userHasAgent()
    {
        if (Entrust::hasRole('Agent')) {
            if ($x=User::getAgentOfUser(Auth::user()->id)) {
                return Agent::with('market')->find($x->agent_id);
            }

            return false;
        }

        return false;
    }

    public static function hasHotelPermission($user,$hotelid)
    {
        return $user->whereHas('hotel',function($q) use ($hotelid){
            $q->where('hotels.id',$hotelid);
        })->count()>0;
    }

    public function hotel()
    {
        return $this->belongsToMany('Hotel');
    }

    public function agent()
    {
        return $this->belongsToMany('Agent');
    }

    public function role()
    {
        return $this->belongsToMany('Role', 'assigned_roles');
    }
}
