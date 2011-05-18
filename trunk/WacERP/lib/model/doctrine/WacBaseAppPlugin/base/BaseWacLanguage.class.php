<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacLanguage', 'wac_db_connection1');

/**
 * BaseWacLanguage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property string $name
 * @property string $code
 * @property string $memo
 * @property string $pr_str1
 * @property string $pr_str2
 * @property Doctrine_Collection $WacMaterialLang
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getPrInt1()          Returns the current record's "pr_int1" value
 * @method integer             getPrInt2()          Returns the current record's "pr_int2" value
 * @method integer             getPriority()        Returns the current record's "priority" value
 * @method integer             getIsAvail()         Returns the current record's "is_avail" value
 * @method timestamp           getCreatedAt()       Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()       Returns the current record's "updated_at" value
 * @method string              getName()            Returns the current record's "name" value
 * @method string              getCode()            Returns the current record's "code" value
 * @method string              getMemo()            Returns the current record's "memo" value
 * @method string              getPrStr1()          Returns the current record's "pr_str1" value
 * @method string              getPrStr2()          Returns the current record's "pr_str2" value
 * @method Doctrine_Collection getWacMaterialLang() Returns the current record's "WacMaterialLang" collection
 * @method WacLanguage         setId()              Sets the current record's "id" value
 * @method WacLanguage         setPrInt1()          Sets the current record's "pr_int1" value
 * @method WacLanguage         setPrInt2()          Sets the current record's "pr_int2" value
 * @method WacLanguage         setPriority()        Sets the current record's "priority" value
 * @method WacLanguage         setIsAvail()         Sets the current record's "is_avail" value
 * @method WacLanguage         setCreatedAt()       Sets the current record's "created_at" value
 * @method WacLanguage         setUpdatedAt()       Sets the current record's "updated_at" value
 * @method WacLanguage         setName()            Sets the current record's "name" value
 * @method WacLanguage         setCode()            Sets the current record's "code" value
 * @method WacLanguage         setMemo()            Sets the current record's "memo" value
 * @method WacLanguage         setPrStr1()          Sets the current record's "pr_str1" value
 * @method WacLanguage         setPrStr2()          Sets the current record's "pr_str2" value
 * @method WacLanguage         setWacMaterialLang() Sets the current record's "WacMaterialLang" collection
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacLanguage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_language');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('pr_int1', 'integer', 4, array(
             'type' => 'integer',
             'default' => '0',
             'length' => 4,
             ));
        $this->hasColumn('pr_int2', 'integer', 4, array(
             'type' => 'integer',
             'default' => '0',
             'length' => 4,
             ));
        $this->hasColumn('priority', 'integer', 4, array(
             'type' => 'integer',
             'default' => '50',
             'length' => 4,
             ));
        $this->hasColumn('is_avail', 'integer', 1, array(
             'type' => 'integer',
             'default' => '1',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('code', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('memo', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('pr_str1', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('pr_str2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('WacMaterialLang', array(
             'local' => 'lang_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}