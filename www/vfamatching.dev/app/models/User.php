<?php

class User extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'email' => 'required',
		'password' => 'required',
		'last_login' => 'required',
		'role' => 'required'
	);
}