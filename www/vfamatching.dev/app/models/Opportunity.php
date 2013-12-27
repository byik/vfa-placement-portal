<?php

class Opportunity extends BaseModel {
    protected $table = 'opportunities';

    protected function rules()
    {
        return array(
            'company_id'=>'required|exists:companies,id',
            'city'=>'required|max:280',
            'title'=>'required|max:70',
            'teaser'=>'required|max:140',
            'description'=>'required|max:1400',
            'responsibilitiesAnswer'=>'required|max:280',                
            'skillsAnswer'=>'required|max:280',
            'developmentAnswer'=>'required|max:280',
            'isPublished'=> 'required|in:0,1'
        );
    }

    protected function adminRules()
    {
        return $this->rules();
    }

	protected $guarded = array();

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
        return $this->belongsToMany('AdminNote', 'adminNote_opportunity', 'opportunity_id', 'adminNote_id');
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
