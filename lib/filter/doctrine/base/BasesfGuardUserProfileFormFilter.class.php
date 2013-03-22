<?php

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    quieroeldiscorolling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('user'), 'add_empty' => true)),
      'facebook_uid'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'twitter_username' => new sfWidgetFormFilterInput(),
      'first_name'       => new sfWidgetFormFilterInput(),
      'last_name'        => new sfWidgetFormFilterInput(),
      'email_address'    => new sfWidgetFormFilterInput(),
      'email_hash'       => new sfWidgetFormFilterInput(),
      'profile_image'    => new sfWidgetFormFilterInput(),
      'dni'              => new sfWidgetFormFilterInput(),
      'phone_number'     => new sfWidgetFormFilterInput(),
      'birth_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'points'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('user'), 'column' => 'id')),
      'facebook_uid'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'twitter_username' => new sfValidatorPass(array('required' => false)),
      'first_name'       => new sfValidatorPass(array('required' => false)),
      'last_name'        => new sfValidatorPass(array('required' => false)),
      'email_address'    => new sfValidatorPass(array('required' => false)),
      'email_hash'       => new sfValidatorPass(array('required' => false)),
      'profile_image'    => new sfValidatorPass(array('required' => false)),
      'dni'              => new sfValidatorPass(array('required' => false)),
      'phone_number'     => new sfValidatorPass(array('required' => false)),
      'birth_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'points'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'position'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'user_id'          => 'ForeignKey',
      'facebook_uid'     => 'Number',
      'twitter_username' => 'Text',
      'first_name'       => 'Text',
      'last_name'        => 'Text',
      'email_address'    => 'Text',
      'email_hash'       => 'Text',
      'profile_image'    => 'Text',
      'dni'              => 'Text',
      'phone_number'     => 'Text',
      'birth_date'       => 'Date',
      'points'           => 'Number',
      'position'         => 'Number',
    );
  }
}
