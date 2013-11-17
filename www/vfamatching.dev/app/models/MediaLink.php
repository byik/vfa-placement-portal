<?php

class MediaLink extends BaseModel {
    protected function rules()
    {
        return array(
            'url'=>'url',
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
