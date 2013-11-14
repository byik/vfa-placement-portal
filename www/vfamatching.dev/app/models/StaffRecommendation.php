<?php

class StaffRecommendation extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function fellow()
	{
		$this->belongsTo('Fellow');
	}

	public function company()
	{
		$this->belongsTo('Company');
	}
}
