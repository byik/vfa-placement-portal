<?php

class Fellow extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function mediaLinks()
    {
        return $this->belongsToMany('MediaLink');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function placementStatuses()
    {
    	return $this->hasMany('PlacementStatus')
    }

    public function adminNotes()
    {
        return $this->belongsToMany('adminNote');
    }
}