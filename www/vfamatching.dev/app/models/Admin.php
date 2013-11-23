<?php

class Admin extends BaseModel {
    protected function rules()
    {
        return array('phoneNumber'=> 'digits:10');
    }

	protected $guarded = array();

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function adminNotes()
    {
    	return $this->hasMany('AdminNote');
    }
}
