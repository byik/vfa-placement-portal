<?php

class FellowSkill extends BaseModel {
    protected function rules()
    {
        return array('skill'=> 'required|between:1,140');
    }

	protected $guarded = array();

	public function fellow()
	{
		$this->belongsTo("Fellow");
	}
}
