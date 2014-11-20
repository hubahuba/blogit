<?php

class Media extends Eloquent {

	/**
	 * The database table menus by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_media';

    /**
     * Fillable of menus data
     *
     * @var array
     */
    protected $fillable = [
        'thumbnail', 'medium', 'large', 'description', 'creator'
    ];

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

    /**
     * Relation From Posts Model
     * @return object
     */
    public function feature(){
        return $this->hasMany('Posts', 'feature_image');
    }

}
