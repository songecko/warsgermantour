<?php

class myUser extends sfGuardSecurityUser
{
	public function isAuthenticated()
	{
		$fbUser = sfFacebook::getUser();
		if(!$fbUser && parent::isAuthenticated())
		{
			$this->signOut();
		}
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
		if(isset($signedRequest['page']['liked']))
		{
			$this->setAttribute('signed_request', $signedRequest);
			return true;
		}else if($this->hasAttribute('signed_request'))
		{ 
			return true;
		}
		
		return false;
	}
	
	public function isPageLike()
	{
		$request = sfContext::getInstance()->getRequest();
		if($this->isOnFacebookIframe())
		{
			$signedRequest = sfFacebook::getSignedRequest($request);
			if(!isset($signedRequest['page']['liked']))
			{
				$signedRequest = $this->getAttribute('signed_request');
			}
			
			return $signedRequest['page']['liked'];
		}
		
		return false;
	}
	
	public function getUrlAfterLogin()
	{
		$context = sfContext::getInstance();
		
		if($this->isOnFacebookIframe())
		{
			return sfConfig::get('app_facebook_tab_url');
		}else
		{
			return $context->getController()->genUrl('@homepage');
		}
	}
}
