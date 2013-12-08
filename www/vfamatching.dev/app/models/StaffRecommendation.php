<?php

class StaffRecommendation extends BaseModel {
    protected $table = 'staffRecommendations';

	protected function rules()
    {
        return array(); //no rules :]
    }

    protected function adminRules()
    {
        return $this->rules();
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
