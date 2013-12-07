<?php

class AdminNote extends BaseModel {
    protected $table = 'adminNotes';

    protected function rules()
    {
        return array('content'=> 'required|max:1400');
    }

	protected $guarded = array();

	public function admin()
	{
		return $this->belongsTo('Admin');
	}
}
