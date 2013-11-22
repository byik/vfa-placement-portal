<?php

class StaffRecommendation extends BaseModel {
	protected function rules()
    {
        return array(); //no rules :]
    }

    protected $guarded = array();

	public function fellow()
	{
		$this->belongsTo('Fellow');
	}

	public function company()
	{
		$this->belongsTo('Company');
	}
}
