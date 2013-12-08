<?php

class OpportunityTag extends BaseModel {
    protected $table = 'opportunityTag';

	protected function rules()
    {
        return array('tag'=> 'required|between:1,140');
    }

    protected function adminRules()
    {
        return $this->rules();
    }

    protected $guarded = array();

	public function opportunity()
	{
		$this->belongsTo('Opportunity');
	}
}
