<?php

class Pitch extends BaseModel {
    protected $table = 'pitches';

    protected function rules()
    {
        return array(
            'body'=> 'required|between:140,1400',
            'status'=>'required|in:Under Review,Waitlisted,Approved');
    }

	protected $guarded = array();

	public function fellow()
    {
        return $this->belongsTo('Fellow');
    }

    public function opportunity()
    {
    	return $this->belongsTo('Opportunity');
    }
}
