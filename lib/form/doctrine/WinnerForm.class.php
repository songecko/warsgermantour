<?php

/**
 * Winner form.
 *
 * @package    quieroeldiscorolling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WinnerForm extends BaseWinnerForm
{
  public function configure()
  {
  	$this->useFields(array('user_id', 'created_at', 'price'));
  	$this->setWidget('created_at', new sfWidgetFormDateTime(array(
  			'with_time' => false
  	)));
  }
}
