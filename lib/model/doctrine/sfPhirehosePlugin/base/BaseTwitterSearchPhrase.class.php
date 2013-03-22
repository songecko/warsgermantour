<?php

/**
 * BaseTwitterSearchPhrase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $phrase
 * 
 * @method string              getPhrase() Returns the current record's "phrase" value
 * @method TwitterSearchPhrase setPhrase() Sets the current record's "phrase" value
 * 
 * @package    quieroeldiscorolling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTwitterSearchPhrase extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('twitter_search_phrase');
        $this->hasColumn('phrase', 'string', 140, array(
             'type' => 'string',
             'length' => 140,
             ));


        $this->index('phrase', array(
             'fields' => 
             array(
              0 => 'phrase',
             ),
             'unique' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}