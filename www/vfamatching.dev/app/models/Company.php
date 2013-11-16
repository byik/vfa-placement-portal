<?php

class Company extends Eloquent {
	protected $guarded = array();

	public static $createRules = array(
        'name'=>'max:280|unique';
        'city'=>'max:280';
        'url'=>'url';
        'tagline'=>'max:140';
        'visionAnswer'=>'max:280';
        'needsAnswer'=>'max:280';
        'teamAnswer'=>'max:280';
        'employees'=>'integer';
        'yearFounded'=>'integer';
        'twitterHandle'=>'max:15';
        );

    public static $updateRules = array(
        'name'=>'max:280';
        'city'=>'max:280';
        'url'=>'url';
        'tagline'=>'max:140';
        'visionAnswer'=>'max:280';
        'needsAnswer'=>'max:280';
        'teamAnswer'=>'max:280';
        'employees'=>'integer';
        'yearFounded'=>'integer';
        'twitterHandle'=>'max:15';
        );
        );

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

    public function adminNotes()
    {
        return $this->belongsToMany('adminNote');
    }
}
