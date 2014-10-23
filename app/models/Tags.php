<?php

class Categories extends Eloquent {

	/**
	 * The database table tags by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_tags';

    /**
     * Fillable of tags data
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'creator'
    ];

    /**
     * Relation from PostCategory model
     * @return object
     */
    public function ofPost(){
        return $this->hasMany('PostCategory', 'tag_id');
    }

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
