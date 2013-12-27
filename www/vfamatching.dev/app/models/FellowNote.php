<?php

class FellowNote extends BaseModel {
    protected $table = 'fellowNotes';

    protected function rules()
    {
        return array('content'=> 'required|max:1400');
    }

    protected function fellowRules()
    {
        return $this->rules();
    }

    protected $guarded = array();

    public function fellow()
    {
        return $this->belongsTo('Fellow');
    }
}
