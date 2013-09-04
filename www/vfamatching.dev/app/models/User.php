<?php

class User extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'email' => 'required',
		'password' => 'required',
		'last_login' => 'required',
		'role' => 'required'
	);

	public static function roles(){
		return array('Admin', 'Fellow', 'Hiring Manager');
	}
}