<?php

class Fellow extends BaseModel {
    protected $table = 'fellows';

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

    protected function adminRules()
    {
        return $this->rules();
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
        return $this->belongsToMany('AdminNote', 'adminNote_fellow', 'fellow_id', 'adminNote_id');
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

    public function printSkills()
    {
        $current = 0;
        $count = count($this->fellowSkills);
        foreach($this->fellowSkills as $fellowSkill){
            $this->skills .= $fellowSkill->skill;
            $current += 1;
            if($current != $count){
                $this->skills .= ", ";
            }
        }
        return $this->skills;
    }

    //returns the percent of current fellows with accepted offers
    public static function percentWithAcceptedOffer()
    {
        //calculate the percent of fellows that are new this year or currently published that have a placementStatus 
        //with status = Offer Accepted
        $withAcceptedOfferCount = Fellow::select('fellows.*', 'placementStatuses.status')
            ->leftJoin('placementStatuses', 'fellows.id', '=', 'placementStatuses.fellow_id')
            ->where('placementStatuses.status','=','Offer Accepted')
            ->where(function($query) {
                $query->where('fellows.created_at', '>', DB::raw('DATE_SUB(NOW(),INTERVAL 1 YEAR)'))//added this year
                ->orWhere('fellows.isPublished', '=', true);//or is published
            })
            ->groupBy('fellows.id')
            // ->having('fellows.created_at', '>', 'DATE_SUB(NOW(),INTERVAL 1 YEAR)')//added this year
            // ->having('fellows.isPublished', '=', true)//or is published
            ->count();
        $totalCount = Fellow::select('fellows.*', 'users.firstName', 'users.lastName')
            ->where('fellows.created_at', '>', DB::raw('DATE_SUB(NOW(),INTERVAL 1 YEAR)'))//added this year
            ->orWhere('fellows.isPublished', '=', true)//or is published
            ->count();
        if($totalCount == 0){
            return 0;
        } elseif($totalCount < $withAcceptedOfferCount) {
            return 1;
        } else {
            return floatval($withAcceptedOfferCount)/floatval($totalCount);
        }
    }
}