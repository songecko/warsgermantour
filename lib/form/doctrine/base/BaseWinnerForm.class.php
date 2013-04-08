<?php

/**
 * Winner form base class.
 *
 * @method Winner getObject() Returns the current form's model object
 *
 * @package    quieroeldiscorolling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWinnerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('user'), 'add_empty' => false)),
      'price'      => new sfWidgetFormChoice(array('choices' => array('Heladera' => 'Heladera', 'Giftpacks' => 'Giftpacks', 'Pasajes' => 'Pasajes', 'Remeras' => 'Remeras', 'Remeras + Giftpack' => 'Remeras + Giftpack'))),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('user'))),
      'price'      => new sfValidatorChoice(array('choices' => array(0 => 'Heladera', 1 => 'Giftpacks', 2 => 'Pasajes', 3 => 'Remeras', 4 => 'Remeras + Giftpack'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('winner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Winner';
  }

}
