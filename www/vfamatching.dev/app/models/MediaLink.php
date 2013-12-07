<?php

class MediaLink extends BaseModel {
    protected $table = 'mediaLinks';

    protected function rules()
    {
        return array(
            'url'=>'required|url',
            'title'=>'max:140',
        );
    }

	protected $guarded = array();

	public function companies()
    {
        return $this->belongsToMany('Company');
    }

    public function fellows()
    {
        return $this->belongsToMany('Fellow');
    }
}
