<?php

class Settings extends Eloquent {

	/**
	 * The database table settings by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_settings';

    /**
     * Fillable of settings data
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];

}
