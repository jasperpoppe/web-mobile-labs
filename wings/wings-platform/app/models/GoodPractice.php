<?php

class GoodPractice extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Good_Practices';


    public function Services()
    {
        return $this->belongsToMany('Service', 'Good_Practices_has_Services', 'Good_Practices_ID', 'Services_ID');
    }
}