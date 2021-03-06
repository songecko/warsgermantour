<?php

/**
 * BasePromoCode
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property Doctrine_Collection $UserPromoCodes
 * 
 * @method string              getCode()           Returns the current record's "code" value
 * @method Doctrine_Collection getUserPromoCodes() Returns the current record's "UserPromoCodes" collection
 * @method PromoCode           setCode()           Sets the current record's "code" value
 * @method PromoCode           setUserPromoCodes() Sets the current record's "UserPromoCodes" collection
 * 
 * @package    quieroeldiscorolling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePromoCode extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('promo_code');
        $this->hasColumn('code', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('UserPromoCode as UserPromoCodes', array(
             'local' => 'id',
             'foreign' => 'promo_code_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}