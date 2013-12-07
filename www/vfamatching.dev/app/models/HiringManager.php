<?php

class HiringManager extends BaseModel {
    protected $table = 'hiringManagers';

    protected function rules()
    {
        return array(
            'phoneNumber'=> 'digits:10');
    }

    protected $guarded = array();

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function company()
    {
        return $this->belongsTo('Company');
    }
}
