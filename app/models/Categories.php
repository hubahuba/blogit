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
        'name', 'slug', 'description', 'creator'
    ];

    public function ofPost(){
        return $this->hasMany('PostCategory', 'category_id');
    }

    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
