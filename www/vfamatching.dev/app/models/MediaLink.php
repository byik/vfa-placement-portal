<?php

class MediaLink extends Eloquent {
	protected $guarded = array();

	public static $createRules = array(
        'url'=>'url';
        'title'=>'max:140';
        );
    public static $updateRules = array(
        'url'=>'url';
        'title'=>'max:140';
        );

	public function companies()
    {
        return $this->belongsToMany('Company');
    }

    public function fellows()
    {
        return $this->belongsToMany('Fellow');
    }
}
