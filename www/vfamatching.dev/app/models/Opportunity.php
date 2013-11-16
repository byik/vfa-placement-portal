<?php

class Opportunity extends Eloquent {
	protected $guarded = array();

    public static $createRules = array(
        'company_id'=>'exits:companies, id';
        'title'=>'max:140|alpha_num';
        'description'=>'max:1400|alpha_num';
        'responsibilitiesAnswer'=>'max:280|alpha_num';                
        'skillsAnswer'=>'max:280|alpha_num';
        'developementAnswer'=>'max:280|alpha_num';
        );
    public static $updateRules = array(
        'company_id'=>'exits:companies, id';
        'title'=>'max:140|alpha_num';
        'description'=>'max:1400|alpha_num';
        'responsibilitiesAnswer'=>'max:280|alpha_num';                
        'skillsAnswer'=>'max:280|alpha_num';
        'developementAnswer'=>'max:280|alpha_num';
        );


	public function company()
    {
        return $this->belongsTo('Company');
    }

    public function placementStatuses()
    {
    	return $this->hasMany('PlacementStatus');
    }

    public function adminNotes()
    {
        return $this->belongsToMany('adminNote');
    }

    public function pitches()
    {
        return $this->hasMany('Pitch');
    }

    public function opportunityTags()
    {
        return $this->hasMany('OpportunityTag');
    }

    public function staffRecommendations()
    {
        return $this->hasMany('StaffRecommendation');
    }
}
