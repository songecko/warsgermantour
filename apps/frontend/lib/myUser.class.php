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
	
	public function isOnFacebookIframe()
	{
		$request = sfContext::getInstance()->getRequest();
		$signedRequest = sfFacebook::getSignedRequest($request);
		if($this->hasAttribute('signed_request'))
		{ 
			return true;
		}else if(isset($signedRequest['page']['liked']))
		{
			$this->setAttribute('signed_request', $signedRequest);
			return true;
		}
		
		return false;
	}
	
	public function isPageLike()
	{
		$request = sfContext::getInstance()->getRequest();
		if($this->isOnFacebookIframe($request))
		{
			$signedRequest = $this->getAttribute('signed_request');
			
			return $signedRequest['page']['liked'];
		}
		
		return false;
	}
	
	public function getUrlAfterLogin()
	{
		if($this->isOnFacebookIframe())
		{
			return 'https://www.facebook.com/WarsteinerArgentina/app_465909386814672';
		}else
		{
			return '@homepage';
		}
	}
}
