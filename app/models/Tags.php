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

    public function ofPost(){
        return $this->hasMany('PostCategory', 'tag_id');
    }

    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
