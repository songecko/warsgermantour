<?php

/**
 * Tweet form base class.
 *
 * @method Tweet getObject() Returns the current form's model object
 *
 * @package    quieroeldiscorolling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTweetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'twitter_guid'    => new sfWidgetFormInputText(),
      'twitter_user_id' => new sfWidgetFormInputText(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('user'), 'add_empty' => false)),
      'text'            => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'twitter_guid'    => new sfValidatorString(array('max_length' => 22)),
      'twitter_user_id' => new sfValidatorInteger(),
      'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('user'))),
      'text'            => new sfValidatorString(array('max_length' => 140)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Tweet', 'column' => array('twitter_guid')))
    );

    $this->widgetSchema->setNameFormat('tweet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tweet';
  }

}
