<?php

class Country extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Countries';

    public function GoodPractices()
    {
        return $this->hasMany('GoodPractice', 'Countries_ID');
    }
}