<?php namespace Mailers;

class HiringManagerMailer {

	public function newFellowPitch($pitch)
	{
		foreach($pitch->opportunity->company->hiringManagers as $hiringManager){
			$mailer = new UserMailer($hiringManager->user);
    		$mailer->adminApprovedFellowPitch($pitch)->deliver();
		}
	}
}