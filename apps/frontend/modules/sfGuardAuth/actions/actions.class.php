<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeTwitterSignin(sfWebRequest $request)
	{		
		$user = $this->getUser();
		
		/* If the oauth_token is old get a new token. */
		if (!$request->getParameter('oauth_verifier')) 
		{
			/* Build TwitterOAuth object with client credentials. */
			$connection = new TwitterOAuth(sfConfig::get('app_twitter_consumer_key'), sfConfig::get('app_twitter_consumer_secret'));
			
			/* Get temporary credentials. */
			$request_token = $connection->getRequestToken($this->generateUrl('twitter_signin', array(), true));
			
			/* Save temporary credentials to session. */
			$token = $request_token['oauth_token'];
			$user->setAttribute('oauth_token', $token);
			$user->setAttribute('oauth_token_secret', $request_token['oauth_token_secret']);
			
			/* Build authorize URL and redirect user to Twitter. */
			if ($connection->http_code == 200)
			{
				$url = $connection->getAuthorizeURL($token);
				$this->redirect($url);
			}
		}else
		{
			if($request->getParameter('oauth_token') && ($user->getAttribute('oauth_token') !== $request->getParameter('oauth_token')))
			{
				$this->redirect($this->generateUrl('homepage'));
			}
			
			/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
			$connection = new TwitterOAuth(sfConfig::get('app_twitter_consumer_key'), sfConfig::get('app_twitter_consumer_secret'), $user->getAttribute('oauth_token'), $user->getAttribute('oauth_token_secret'));
			
			/* Request access tokens from twitter */
			$access_token = $connection->getAccessToken($request->getParameter('oauth_verifier'));
			
			/* Save the access tokens. Normally these would be saved in a database for future use. */
			$user->setAttribute('access_token', $access_token);
			
			/* Remove no longer needed request tokens */
			//unset($_SESSION['oauth_token']);
			//unset($_SESSION['oauth_token_secret']);
			
			/* If HTTP response is 200 continue otherwise send to connect page to retry */
			if (200 == $connection->http_code) {
				/* The user has been verified and the access tokens can be saved for future use */
				$user->setAttribute('status', 'verified');
				
				$credentials = $connection->get('account/verify_credentials');
				$twitterUsername = $credentials->screen_name;
				
				$sfGuardUser =  sfGuardUserTable::getInstance()->getOrCreateGuardUserByTwitterUsername($twitterUsername, true);					
				if ($sfGuardUser)
				{
					if(!$sfGuardUser->Profile->getProfileImage())
					{
						$sfGuardUser->Profile->setProfileImage(str_replace('_normal.jpg', '_reasonably_small.jpg', $credentials->profile_image_url));
						$sfGuardUser->save();
					}
					
					$this->getUser()->signIn($sfGuardUser);
				
					$this->redirect($this->generateUrl('homepage'));
				}
			}
		}
		
		return $this->redirect($this->generateUrl('homepage'));
	}
	
	public function executeCreateProfile(sfWebRequest $request)
	{
		$user = $this->getUser();
		$this->redirectUnless($user->isAuthenticated(), 'homepage');
		
		if($user->hasProfile())
		{
			$this->redirect($this->generateUrl('homepage'));
		}
		
		$this->form = new RegisterForm($user->getGuardUser()->Profile);
		
		if($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter($this->form->getName()));
			if($this->form->isValid())
			{
				$values = $this->form->getValues();
				if(isset($values['accept_bases']) && $values['accept_bases'] === true)
				{
					try 
					{		
						if($this->form->save())
						{
							return $this->redirect($this->generateUrl('homepage'));
						}					
					}catch (sfValidatorError $exception)
					{
					}
				}
			}
		}
	}
}
