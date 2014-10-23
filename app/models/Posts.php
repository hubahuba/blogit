<?php

class Posts extends Eloquent {

	/**
	 * The database table categories by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_posts';

    /**
     * Fillable of categories data
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'post', 'lang', 'feature_image', 'creator'
    ];

    public function ofCategory(){
        return $this->hasMany('PostCategory', 'post_id');
    }

    public function ofTag(){
        return $this->hasMany('PostTag', 'post_id');
    }

    public function media(){
        return $this->belongsTo('Media', 'feature_image');
    }

    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
