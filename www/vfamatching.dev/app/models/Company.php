<?php

class Company extends BaseModel {
    protected $table = 'companies';

	protected function rules()
    {
        return array(
            'name'=>'required|max:280|unique:companies,name,'.$this->id,
            'city'=>'required|max:280',
            'url'=>'required|url',
            'tagline'=>'required|max:140',
            'visionAnswer'=>'required|max:280',
            'needsAnswer'=>'required|max:280',
            'teamAnswer'=>'required|max:280',
            'employees'=>'required|integer',
            'yearFounded'=>'required|digits:4',
            'twitterHandle'=>'max:15',
            'isPublished'=> 'required|in:0,1'
        );
    }

    protected function adminRules()
    {
        return $this->rules();
    }

    protected $guarded = array();

	public function mediaLinks()
    {
        return $this->belongsToMany('MediaLink');
    }

    public function opportunities()
    {
        return $this->hasMany('Opportunity');
    }

    public function hiringManagers()
    {
        return $this->hasMany('HiringManager');
    }

    public function adminNotes()
    {
        return $this->belongsToMany('AdminNote', 'adminNote_company', 'company_id', 'adminNote_id');
    }
}
