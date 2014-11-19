<?php
/**
 * Created by PhpStorm.
 * User: jasperpoppe
 * Date: 19/11/14
 * Time: 09:45
 */

class Service extends Eloquent {
    protected $table = 'Services';

    public function GoodPractices()
    {
        //return $this->hasMany('GoodPractice', 'Good_Practices_has_Services', 'Good_Practices_ID', 'Services_ID');
        return $this->belongsToMany('GoodPractice', 'Good_Practices_has_Services', 'Good_Practices_ID', 'Services_ID');
    }
}