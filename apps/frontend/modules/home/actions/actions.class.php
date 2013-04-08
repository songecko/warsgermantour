<?php

/**
 * home actions.
 *
 * @package    quieroeldiscorolling
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
	public function preExecute()
	{
		if($this->getUser()->hasFlash('success'))
		{
			$this->success = $this->getUser()->getFlash('success');
		}
		if($this->getUser()->hasFlash('error'))
		{
			$this->error = $this->getUser()->getFlash('error');
		}
	}
	
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{	
		//$this->getUser()->signOut();die;
		$isMobile = (preg_match('#^(?!.*iPad).*(Mobile|Jasmine|Symbian|NetFront|BlackBerry|Opera Mini|Opera Mobi).*$#i', $request->getHttpHeader('User-Agent')) && !$this->getUser()->getAttribute('fullversion', false));		
		$isOnFacebook = $this->getUser()->isOnFacebookIframe();
		
		//if the user is not on facebook and not on mobile, redirect to facebook tab page
		if(!$isOnFacebook && !$isMobile)
		{
			//$this->redirect(sfConfig::get('app_facebook_tab_url'));
		}
			
		//if the user like is on facebook and not like the facebook page, redirect
		if($isOnFacebook && $this->getUser()->isPageLike() !== true)
		{
			$this->redirect('prelike');
		}

		//Check if the user is signed in, if not, sign in with facebook
		$this->redirectUnless($this->getUser()->isAuthenticated(), '@facebook_signin?forward='.urlencode($request->getUri()));
		
		//Check if the user has the profile
		$this->redirectUnless($this->getUser()->hasProfile(), 'create_profile');
		
		//START THE HOMEPAGE ACTION		
		$this->airplaneUsers = sfGuardUserTable::getInstance()->getUsersOrderByPosition(23);
		$this->isOnAirplane = false;
		foreach($this->airplaneUsers as $airplaneUser)
		{
			if($airplaneUser->getId() === $this->getUser()->getGuardUser()->getId())
			{
				$this->isOnAirplane = true;
			}
		}
		$this->form = new PromoCodeForm();
		if($request->hasParameter($this->form->getName()))
		{
			$this->form->bind($request->getParameter($this->form->getName()));
		}
		
		/*if ($isMobile)
		{
			$this->setLayout('mobile_layout');
			
			return 'SuccessMobile';
		}*/
	}
		
	public function executeWinners(sfWebRequest $request)
	{
		$this->winners = WinnerTable::getInstance()->getWinnersOrderByDate();
	}
	
	public function executePrelike(sfWebRequest $request)
	{
	}
	
	public function executeBases(sfWebRequest $request)
	{	
	}
	
	public function executeComo(sfWebRequest $request)
	{
	}
	
	public function executeFullVersion(sfWebRequest $request)
	{
		$this->getUser()->setAttribute('fullversion', true);	
		
		$this->redirect($this->generateUrl('homepage'));
	}
	
	public function executeSendPromoCode(sfWebRequest $request)
	{
		$user = $this->getUser();
		$this->user = $this->getUser()->getGuardUser();
				
		$this->redirectUnless($user->isAuthenticated(), 'homepage');
		
		$this->form = new PromoCodeForm();
		
		if($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter($this->form->getName()));

			if ($this->form->isValid())
			{
				$values = $this->form->getValues();
				
				$promoCode = PromoCodeTable::getInstance()->getByCode($values['code']);
				if(!$promoCode) //Si el codigo no existe
				{
					$promoCode = new PromoCode();
					$promoCode->setCode($values['code']);
					$promoCode->save();
					
					/*$anyUserHasPromoCode = UserPromoCodeTable::getInstance()->getByPromoCode($promoCode->getId());
					if(!$anyUserHasPromoCode) //Si el codigo no fue cargado ya por algun usuario
					{*/
						try
						{
							//Cargamos el codigo al usuario
							$userHasPromoCode = new UserPromoCode();
							$userHasPromoCode->setUser($this->user);
							$userHasPromoCode->setPromoCode($promoCode);
				
							$userHasPromoCode->save();
				
							//Add points
							$this->user->Profile->setPoints($this->user->Profile->getPoints() + 1);
							$this->user->save();
							$this->user->Profile->moveToFirst();
							
							//Send facebook Post
							$tabUrl = sfConfig::get('app_facebook_tab_url');
							$message = "Estoy participando por un viaje a Alemania en el German Master Tour de Warsteiner.";
							$this->user->Profile->publishFacebookPost($message, $tabUrl);
							
							$this->getUser()->setFlash('success', 'Felicitaciones, el c&oacute;digo fu&eacute; ingresado correctamente, est&aacute;s dentro del avi&oacute;n.');								
						} catch (Doctrine_Exception $e)
						{
							$this->getUser()->setFlash('error', 'Hubo un problema al cargar el c&oacute;digo, vuelva a intentarlo mas tarde.');
						}
					/*}else
					{
						$this->getUser()->setFlash('error', 'C&oacute;digo ya ingresado previamente.');
					}*/
				}else
				{
					$this->getUser()->setFlash('error', 'C&oacute;digo ya ingresado previamente.');
				}
			}else
			{
				$this->forward('home', 'index');
			}		
		}
		
		$this->redirect($this->generateUrl('homepage'));
	}
}
