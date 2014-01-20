<?php

class Pitch extends BaseModel {
    protected $table = 'pitches';

    protected function rules()
    {
        return array(
            'body'=> 'required|between:140,1400',
            'status'=>'required|in:Under Review,Waitlisted,Approved');
    }

    protected function adminRules()
    {
        return $this->rules();
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

    public static function hasPitch(Fellow $fellow, Opportunity $opportunity)
    {
        return (bool) $fellow->pitches()->where('pitches.opportunity_id', '=', $opportunity->id)->count();
    }

    public static function getPitch(Fellow $fellow, Opportunity $opportunity)
    {
        if(self::hasPitch($fellow, $opportunity)){
            return Pitch::where('fellow_id','=', $fellow->id)
                ->where('opportunity_id','=', $opportunity->id)
                ->first();
        } else {
            throw new Exception('This fellow does not have a Pitch with this opportunity');
        }
    }

    public static function underAdminReview()
    {
        return Pitch::where('status','=',"Under Review")
            ->where('hasAdminApproval', '=', false)
            ->orderBy('created_at', 'ASC')
            ->get(); //newest first
    }

    public static function underHiringManagerReview(Company $company)
    {
        return Pitch::select('*', 'pitches.id')
            ->leftJoin('opportunities','pitches.opportunity_id', '=', 'opportunities.id')
            ->where('status','=',"Under Review")
            ->where('hasAdminApproval', '=', true)
            ->where('opportunities.company_id','=',$company->id)
            ->orderBy('pitches.created_at', 'ASC')
            ->get(); //newest first
    }
}
