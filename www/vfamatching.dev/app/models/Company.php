<?php

class Company extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function mediaLinks()
    {
        return $this->belongsToMany('MediaLink');
    }

    public function opportunities()
    {
        return $this->hasMany('Opportunity');
    }

    public function hiringManagers()
    {
        return $this->hasMany('HiringManager');
    }
}
