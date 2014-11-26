<?php namespace Ngungut\Nccms\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

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

    /**
     * Relation from PostCategory model
     * @return object
     */
    public function ofCategory(){
        return $this->hasMany('PostCategory', 'post_id');
    }

    /**
     * Relation from PostTag model
     * @return object
     */
    public function ofTag(){
        return $this->hasMany('PostTag', 'post_id');
    }

    /**
     * Relation to Media model
     * @return object
     */
    public function media(){
        return $this->belongsTo('Media', 'feature_image');
    }

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
