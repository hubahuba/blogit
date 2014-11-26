<?php namespace Ngungut\Nccms\Model;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

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
     * Get User firstname
     * @return string
     */
    public static function firstname($id){
        $user = static::where('id', '=', $id)->select('firstname')->first();
        return $user['firstname'];
    }

    /**
     * Get User lastname
     * @return string
     */
    public static function lastname($id){
        $user = static::where('id', '=', $id)->select('lastname')->first();
        return $user['lastname'];
    }

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
    public function media(){
        return $this->hasMany('Media', 'creator');
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

    /**
     * Relation from Address model
     * @return mixed
     */
    public function addr(){
        return $this->hasMany('Address', 'creator');
    }

}
