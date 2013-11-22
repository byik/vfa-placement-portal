<?php

class OpportunityTag extends BaseModel {
	protected function rules()
    {
        return array('tag'=> 'required|between:1,140');
    }

    protected $guarded = array();

	public function opportunity()
	{
		$this->belongsTo('Opportunity');
	}
}
