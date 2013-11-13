<?php

class User extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function profile()
	{
		if($this->role == 'Fellow') {
			return $this->hasOne('Fellow');
		} elseif($this->role == 'Hiring Manager') {
			return $this->hasOne('HiringManager');
		}
	}
}
