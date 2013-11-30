<?php

class Fellow extends BaseModel {
    protected function rules()
    {
        return array(
            'bio'=> 'required|between:140,1400',
            'school'=>'required|max:140',
            'major'=>'required|max:140',
            'degree'=>'required|in:BA,BS,MS,MA,MBA,PhD,JD',
            'graduationYear'=> 'required|digits:4',
            'hometown'=>'required|max:140',
            'phoneNumber'=> 'required|digits:10',
            'isPublished'=> 'required|in:0,1',
            'isRemindable'=> 'required|in:0,1'
            );
    }

	protected $guarded = array();

	public function mediaLinks()
    {
        return $this->belongsToMany('MediaLink');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function placementStatuses()
    {
    	return $this->hasMany('PlacementStatus');
    }

    public function adminNotes()
    {
        return $this->belongsToMany('AdminNote');
    }

    public function pitches()
    {
        return $this->hasMany('Pitch');
    }

    public function fellowSkills()
    {
        return $this->hasMany('FellowSkill');
    }

    public function staffRecommendations()
    {
        return $this->hasMany('StaffRecommendation');
    }

    public static function degrees()
    {
        return array(
            "BA",
            "BS",
            "MS",
            "MA",
            "MBA",
            "PhD",
            "JD");
    }
}