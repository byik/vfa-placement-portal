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
		$this->view = 'emails.admin.newFellowPitch';

		//add pitch to data array
		$this->data = array_merge(array("pitch" => $pitch), $this->data);

		return $this;
	}

	public function adminApprovedFellowPitch($pitch)
	{
		$this->subject = 'VFA Fellow ' . $pitch->fellow->user->firstName . ' ' . $pitch->fellow->user->lastName . ', ' . $pitch->fellow->major . ' major, for ' . $pitch->opportunity->company->name . '?';
		$this->view = 'emails.hiringManager.adminApprovedFellowPitch';

		//add pitch to data array
		$this->data = array_merge(array("pitch" => $pitch), $this->data);

		return $this;
	}
}