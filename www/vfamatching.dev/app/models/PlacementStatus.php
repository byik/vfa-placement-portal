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

    public static function statuses()
    {
        return array("Introduced",
            "Contacted",
            "Phone Interview Pending",
            "Phone Interview Complete",
            "On-site Interview Pending",
            "On-site Interview Complete",
            "Offer Extended",
            "Offer Accepted",
            "Offer Rejected");
    }
}
