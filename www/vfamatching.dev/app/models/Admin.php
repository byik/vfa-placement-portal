<?php

class Admin extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function adminNotes()
    {
    	return $this->hasMany('AdminNote');
    }
}
