<?php namespace Mailers;

class UserMailer extends Mailer {

	public function welcome()
	{
		$this->subject = 'Welcome to the VFA Placement Portal!';
		$this->view = 'emails.user.welcome';

		return $this;
	}
}