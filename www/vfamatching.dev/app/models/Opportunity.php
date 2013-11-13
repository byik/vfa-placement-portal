<?php

class Opportunity extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function company()
    {
        return $this->belongsTo('Company');
    }

    public function placementStatuses()
    {
    	return $this->hasMany('PlacementStatus');
    }

    public function adminNotes()
    {
        return $this->belongsToMany('adminNote');
    }

    public function pitches()
    {
        return $this->hasMany('Pitch')
    }
}
