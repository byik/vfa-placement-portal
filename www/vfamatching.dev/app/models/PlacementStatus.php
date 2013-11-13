<?php

class PlacementStatus extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function fellow()
    {
        return $this->belongsTo('Fellow');
    }

    public function opportunity()
    {
    	return $this->belongsTo('Opportunity');
    }
}
