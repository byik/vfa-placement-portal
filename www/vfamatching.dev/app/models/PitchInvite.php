<?php

class PitchInvite extends Eloquent {
	protected $table = 'pitchInvites';

	protected $guarded = array();

	public static $rules = array();

	public function fellow()
    {
        return $this->belongsTo('Fellow');
    }

    public function opportunity()
    {
        return $this->belongsTo('Opportunity');
    }

    public function pitch()
    {
        return $this->belongsTo('Pitch');
    }

    public static function hasPitchInvite(Fellow $fellow, Opportunity $opportunity)
    {
        return (bool) $fellow->pitchInvites()->where('pitchInvites.opportunity_id', '=', $opportunity->id)->count();
    }
}
