<?php namespace Mailers;

class AdminMailer {

	public function newFellowPitch($pitch)
	{
		foreach(\Admin::all() as $admin){
			$mailer = new UserMailer($admin->user);
    		$mailer->newFellowPitch($pitch)->deliver();
		}
	}
}