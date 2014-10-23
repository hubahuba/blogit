<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Fillable data from user table
     *
     */
    protected $fillable = [
        'username', 'password', 'firstname',
        'lastname', 'nickname', 'level',
        'creator',
    ];

    public function categories(){
        return $this->hasMany('Categories', 'creator');
    }

    public function tags(){
        return $this->hasMany('Tags', 'creator');
    }

    public function users(){
        return $this->hasMany('User', 'creator');
    }

    public function posts(){
        return $this->hasMany('Posts', 'creator');
    }

}
