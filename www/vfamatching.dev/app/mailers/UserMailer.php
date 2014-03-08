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

	public function adminApprovedFellowPitch($pitch, $role)
	{
		if($role == "Hiring Manager"){
			$this->subject = 'VFA Fellow ' . $pitch->fellow->user->firstName . ' ' . $pitch->fellow->user->lastName . ', ' . $pitch->fellow->major . ' major, for ' . $pitch->opportunity->company->name . '?';
			$this->view = 'emails.hiringManager.adminApprovedFellowPitch';
		} else if($role == "Fellow"){
			$this->subject = 'Your pitch for the ' . $pitch->opportunity->title . ' Opportunity at ' . $pitch->opportunity->company->name . ' was approved by VFA';
			$this->view = 'emails.fellow.adminApprovedFellowPitch';
		}

		//add pitch to data array
		$this->data = array_merge(array("pitch" => $pitch), $this->data);

		return $this;
	}
}