<?php

class RegisterForm extends sfGuardUserProfileForm
{
	public function configure()
	{
		$useFields = array(
			'id', 'first_name', 'last_name', 'email_address',
			'phone_number'
		);
		
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
				
		//$this->setWidget('dni', new sfWidgetFormInputText(array(), array('maxlength' => 8)));
		/*$this->setValidator('dni', new sfValidatorNumber(array(
		 'min' => 10000000,
				'max' => 99999999
		)));*/
		
		$this->setWidget('phone_number', new sfWidgetFormPhoneNumber());
		$this->setValidator('phone_number', new sfValidatorPhoneNumber(array('required' => true)));

		/*$this->setWidget('birth_date', new sfWidgetFormBirthDate(array(
			'format' => '%day% %month% %year%'
		)));*/
		
		//$this->setWidget('password', new sfWidgetFormInputPassword());
		//$this->setValidator('password', new sfValidatorString(array('max_length' => 128, 'required' => true)));
		
		//$this->setWidget('password_again', new sfWidgetFormInputPassword());
		//$this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
		
		//Setup validators
		
		$this->setValidator('email_address', new sfValidatorEmail(array(
			'max_length' => 100
		)));
		
		/*$this->widgetSchema['email_address_again'] = clone $this->widgetSchema['email_address'];
		$this->validatorSchema['email_address_again'] = clone $this->validatorSchema['email_address'];*/
		
		$this->validatorSchema->setPostValidator(
			new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email_address')))
		);
		
		//$this->mergePostValidator(new sfValidatorSchemaCompare('email_address', sfValidatorSchemaCompare::EQUAL, 'email_address_again', array(), array('invalid' => 'The two email addresses must be the same.')));
		//$this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
	}
}