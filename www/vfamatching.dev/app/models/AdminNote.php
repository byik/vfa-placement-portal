<?php

class AdminNote extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function admin()
	{
		return $this->belongsTo('Admin');
	}
}
