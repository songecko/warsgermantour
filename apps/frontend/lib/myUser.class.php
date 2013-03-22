<?php

class myUser extends sfGuardSecurityUser
{
	public function isAuthenticated()
	{
		$fbUser = sfFacebook::getUser();
		return (parent::isAuthenticated() && $fbUser);
	}
	
	public function hasProfile()
	{
		return ($this->getGuardUser() && $this->getGuardUser()->Profile && $this->getGuardUser()->Profile->getEmailAddress());
	}
	
	public function hasTwitter()
	{
		return ($this->getGuardUser() && $this->getGuardUser()->Profile && $this->getGuardUser()->Profile->getTwitterUsername());
	}
}
