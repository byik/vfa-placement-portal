<?php

class FellowSkill extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function fellow()
	{
		$this->belongsTo("Fellow");
	}
}
