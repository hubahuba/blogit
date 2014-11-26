<?php namespace Ngungut\Nccms\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostCategory extends Eloquent {

	/**
	 * The database table post category by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_post_category';

    /**
     * Fillable of post category data
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'category_id'
    ];

    /**
     * Relation to Categories model
     * @return object
     */
    public function category(){
        return $this->belongsTo('Categories', 'category_id');
    }

    /**
     * Relation to Posts model
     * @return object
     */
    public function post(){
        return $this->belongsTo('Posts', 'post_id');
    }

}
