<?php

/**
 * BaseWacUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $WacFile
 * @property Doctrine_Collection $WacCategory
 * @property Doctrine_Collection $WacSystemLog
 * 
 * @method Doctrine_Collection getWacFile()      Returns the current record's "WacFile" collection
 * @method Doctrine_Collection getWacCategory()  Returns the current record's "WacCategory" collection
 * @method Doctrine_Collection getWacSystemLog() Returns the current record's "WacSystemLog" collection
 * @method WacUser             setWacFile()      Sets the current record's "WacFile" collection
 * @method WacUser             setWacCategory()  Sets the current record's "WacCategory" collection
 * @method WacUser             setWacSystemLog() Sets the current record's "WacSystemLog" collection
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseWacUser extends sfGuardUser
{
    public function setUp()
    {
        parent::setUp();
        $this->hasMany('WacFile', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('WacCategory', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('WacSystemLog', array(
             'local' => 'id',
             'foreign' => 'user_id'));
    }
}