<?php

class Menus extends Eloquent {

	/**
	 * The database table menus by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_menus';

    /**
     * Fillable of menus data
     *
     * @var array
     */
    protected $fillable = [
        'parent', 'label', 'position', 'object',
        'object_id', 'creator'
    ];

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
