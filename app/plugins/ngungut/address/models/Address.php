<?php namespace Ngungut\Address\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent {

	/**
	 * The database table address by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_addresses';

    /**
     * Fillable of address data
     *
     * @var array
     */
    protected $fillable = [
        'label', 'company', 'phone', 'fax', 'email', 'address', 'map_url', 'creator', 'status'
    ];

    /**
     * Relation to User model
     * @return object
     */
    public function creators(){
        return $this->belongsTo('User', 'creator');
    }

}
