<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    quieroeldiscorolling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('user'), 'add_empty' => false)),
      'facebook_uid'     => new sfWidgetFormInputText(),
      'twitter_username' => new sfWidgetFormInputText(),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'email_address'    => new sfWidgetFormInputText(),
      'email_hash'       => new sfWidgetFormInputText(),
      'profile_image'    => new sfWidgetFormInputText(),
      'dni'              => new sfWidgetFormInputText(),
      'phone_number'     => new sfWidgetFormInputText(),
      'birth_date'       => new sfWidgetFormDateTime(),
      'points'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('user'))),
      'facebook_uid'     => new sfValidatorInteger(),
      'twitter_username' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'last_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email_address'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email_hash'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'profile_image'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'dni'              => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'phone_number'     => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'birth_date'       => new sfValidatorDateTime(array('required' => false)),
      'points'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

}
