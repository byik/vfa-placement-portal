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
		} elseif($this->role == 'Admin') {
			return $this->hasOne('Admin');
		} else {
			throw new Exception("Invalid User role!");
		}
	}
}
