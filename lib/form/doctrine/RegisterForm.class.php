<?php

class RegisterForm extends sfGuardUserProfileForm
{
	public function configure()
	{
		$useFields = array(
			'id', 'first_name', 'dni',
			//'last_name', 'email_address', 'phone_number'
		);
		
		$this->disableCSRFProtection();
		
		//Setup widgets		
		if($this->getObject()->getUserId())
		{		
			$useFields[] = 'user_id';
			$this->useFields($useFields);
			$this->setWidget('user_id', new sfWidgetFormInputHidden());
		}else
		{
			$this->useFields($useFields);
		}
		
		$this->setValidator('first_name', new sfValidatorString(array('max_length' => 50, 'required' => true)));
		
		//$this->setValidator('last_name', new sfValidatorString(array('max_length' => 50, 'required' => true)));
				
		$this->setWidget('dni', new sfWidgetFormInputText(array(), array('maxlength' => 8)));
		$this->setValidator('dni', new sfValidatorNumber(array(
			'min' => 10000000,
			'max' => 99999999
		)));
		
		/*$this->setWidget('phone_number', new sfWidgetFormInputText());
		$this->setValidator('phone_number', new sfValidatorNumber());*/

		/*$this->setWidget('birth_date', new sfWidgetFormBirthDate(array(
			'format' => '%day% %month% %year%'
		)));*/
		
		//$this->setWidget('password', new sfWidgetFormInputPassword());
		//$this->setValidator('password', new sfValidatorString(array('max_length' => 128, 'required' => true)));
		
		//$this->setWidget('password_again', new sfWidgetFormInputPassword());
		//$this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
				
		/*$this->setValidator('email_address', new sfValidatorEmail(array(
			'max_length' => 100
		)));*/
		
		/*$this->widgetSchema['email_address_again'] = clone $this->widgetSchema['email_address'];
		$this->validatorSchema['email_address_again'] = clone $this->validatorSchema['email_address'];*/
		
		$this->setWidget('accept_bases', new sfWidgetFormInputCheckbox());
		$this->setValidator('accept_bases', new sfValidatorBoolean());
		$this->setDefault('accept_bases', true);
		
		/*$this->validatorSchema->setPostValidator(
			new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email_address')))
		);*/
		
		//$this->mergePostValidator(new sfValidatorSchemaCompare('email_address', sfValidatorSchemaCompare::EQUAL, 'email_address_again', array(), array('invalid' => 'The two email addresses must be the same.')));
		//$this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
	}
}