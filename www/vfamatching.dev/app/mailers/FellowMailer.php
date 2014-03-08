<?php namespace Mailers;

class FellowMailer {

	public function adminApprovedFellowPitch($pitch)
	{
		$mailer = new UserMailer($pitch->fellow->user);
		$mailer->adminApprovedFellowPitch($pitch, 'Fellow')->deliver();
	}
}