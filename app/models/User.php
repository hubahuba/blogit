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

    /**
     * Relation from Categories model
     * @return object
     */
    public function categories(){
        return $this->hasMany('Categories', 'creator');
    }

    /**
     * Relation from Tags model
     * @return object
     */
    public function tags(){
        return $this->hasMany('Tags', 'creator');
    }

    /**
     * Self relation from User model
     * @return object
     */
    public function users(){
        return $this->hasMany('User', 'creator');
    }

    /**
     * Selft relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

    /**
     * Relation from Posts model
     * @return mixed
     */
    public function posts(){
        return $this->hasMany('Posts', 'creator');
    }

    /**
     * Relation from Menus model
     * @return mixed
     */
    public function menus(){
        return $this->hasMany('Menus', 'creator');
    }

}
