<?php

class PlacementStatus extends BaseModel {
    protected function rules()
    {
        return array(
            'status'=> 'required|in:Introduced,Contacted,Phone Interview Pending,Phone Interview Complete,On-site Interview Pending,On-site Interview Complete,Offer Extended,Offer Accepted,Offer Rejected',
            'eventDate'=>'date',
            'score'=>'required|in:1,2,3,4,5',
            'message'=>'required|max:280');
    }

    protected $guarded = array();

    protected $table = 'placementStatuses';

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
            'Introduced', //1/8
            'Contacted', //2/8
            'Phone Interview Pending', //3/8
            'Phone Interview Complete', //4/8
            'On-site Interview Pending', //5/8
            'On-site Interview Complete', //6/8
            'Offer Extended', //7/8
            'Offer Accepted', //8/8
            'Offer Rejected'); //0/8
    }
}