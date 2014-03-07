<?php namespace Mailers;

class UserMailer extends Mailer {

	public function welcome()
	{
		$this->subject = 'Welcome to the VFA Placement Portal!';
		$this->view = 'emails.user.welcome';

		return $this;
	}

	public function newFellowPitch($pitch)
	{
		$this->subject = 'New Fellow Pitch';
		$this->view = 'emails.fellow.pitch';

		//add pitch to data array
		$this->data = array_merge(array("pitch" => $pitch), $this->data);

		return $this;
	}
}