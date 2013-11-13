<?php

class MediaLink extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function companies()
    {
        return $this->belongsToMany('Company');
    }
}
