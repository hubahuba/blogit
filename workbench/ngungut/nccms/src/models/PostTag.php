<?php namespace Ngungut\Nccms\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostTag extends Eloquent {

	/**
	 * The database table post tag by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_post_tag';

    /**
     * Fillable of post tag data
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'tag_id'
    ];

    /**
     * Relation to Tags model
     * @return eloquent object
     */
    public function tag(){
        return $this->belongsTo('Tags', 'tag_id');
    }

    /**
     * Relation to Posts model
     * @return object
     */
    public function post(){
        return $this->belongsTo('Posts', 'post_id');
    }

}
