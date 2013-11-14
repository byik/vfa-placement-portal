<?php

class OpportunityTag extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function opportunity()
	{
		$this->belongsTo('Opportunity');
	}
}
