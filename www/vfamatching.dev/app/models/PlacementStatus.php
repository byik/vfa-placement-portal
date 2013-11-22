<?php

class PlacementStatus extends BaseModel {
    protected function rules()
    {
        return array(
            'status'=> 'required|in:Introduced,Contacted,Phone Interview Pending,Phone Interview Complete,On-site Interview Pending,On-site Interview Complete,Offer Extended,Offer Accepted,Offer Rejected',
            'eventDate'=>'date',
            'score'=>'required|in:Admin,Fellow,Hiring Manager',
            'message'=>'required|max:280');
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

    public static function statuses()
    {
        return array(
            'Introduced',
            'Contacted',
            'Phone Interview Pending',
            'Phone Interview Complete',
            'On-site Interview Pending',
            'On-site Interview Complete',
            'Offer Extended',
            'Offer Accepted',
            'Offer Rejected');
    }
}