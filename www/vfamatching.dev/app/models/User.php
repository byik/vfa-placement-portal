<?php

class User extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function profile()
	{
		if($this->role == 'Fellow') {
			return $this->fellow();
		}
	}

	private function fellow()
    {
        return $this->hasOne('Fellow');
    }
}
