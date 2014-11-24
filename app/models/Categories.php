<?php

class Categories extends Eloquent {

	/**
	 * The database table categories by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_categories';

    /**
     * Fillable of categories data
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'icon', 'description', 'creator'
    ];

    /**
     * Relation from PostCategory model
     * @return object
     */
    public function ofPost(){
        return $this->hasMany('PostCategory', 'category_id');
    }

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
