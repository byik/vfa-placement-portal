<?php namespace Mailers;

class FellowMailer {

	public function adminApprovedFellowPitch($pitch)
	{
		$mailer = new UserMailer($pitch->fellow->user);
		$mailer->adminApprovedFellowPitch($pitch, 'Fellow')->deliver();
	}

	public function hiringManagerApprovedFellowPitch($pitch)
	{
		$mailer = new UserMailer($pitch->fellow->user);
		$mailer->hiringManagerApprovedFellowPitch($pitch)->deliver();
	}

	public function hiringManagerWaitlistedFellowPitch($pitch)
	{
		$mailer = new UserMailer($pitch->fellow->user);
		$mailer->hiringManagerWaitlistedFellowPitch($pitch)->deliver();	
	}

	public function fellowAcceptedOffer($placementStatus)
	{
		$mailer = new UserMailer($placementStatus->fellow->user);
		$mailer->fellowAcceptedOffer($placementStatus)->deliver();	
	}
}