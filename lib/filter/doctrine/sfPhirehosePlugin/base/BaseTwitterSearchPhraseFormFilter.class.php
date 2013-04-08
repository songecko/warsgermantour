<?php

/**
 * TwitterSearchPhrase filter form base class.
 *
 * @package    quieroeldiscorolling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTwitterSearchPhraseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'phrase' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'phrase' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('twitter_search_phrase_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TwitterSearchPhrase';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'phrase' => 'Text',
    );
  }
}
