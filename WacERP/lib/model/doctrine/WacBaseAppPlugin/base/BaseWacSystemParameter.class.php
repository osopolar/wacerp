<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacSystemParameter', 'wac_db_connection1');

/**
 * BaseWacSystemParameter
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
 * @property integer $type
 * @property string $value
 * @property string $pr_str1
 * @property string $pr_str2
 * 
 * @method integer            getId()         Returns the current record's "id" value
 * @method integer            getPrInt1()     Returns the current record's "pr_int1" value
 * @method integer            getPrInt2()     Returns the current record's "pr_int2" value
 * @method integer            getPriority()   Returns the current record's "priority" value
 * @method integer            getIsAvail()    Returns the current record's "is_avail" value
 * @method timestamp          getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp          getUpdatedAt()  Returns the current record's "updated_at" value
 * @method string             getName()       Returns the current record's "name" value
 * @method string             getCode()       Returns the current record's "code" value
 * @method integer            getType()       Returns the current record's "type" value
 * @method string             getValue()      Returns the current record's "value" value
 * @method string             getPrStr1()     Returns the current record's "pr_str1" value
 * @method string             getPrStr2()     Returns the current record's "pr_str2" value
 * @method WacSystemParameter setId()         Sets the current record's "id" value
 * @method WacSystemParameter setPrInt1()     Sets the current record's "pr_int1" value
 * @method WacSystemParameter setPrInt2()     Sets the current record's "pr_int2" value
 * @method WacSystemParameter setPriority()   Sets the current record's "priority" value
 * @method WacSystemParameter setIsAvail()    Sets the current record's "is_avail" value
 * @method WacSystemParameter setCreatedAt()  Sets the current record's "created_at" value
 * @method WacSystemParameter setUpdatedAt()  Sets the current record's "updated_at" value
 * @method WacSystemParameter setName()       Sets the current record's "name" value
 * @method WacSystemParameter setCode()       Sets the current record's "code" value
 * @method WacSystemParameter setType()       Sets the current record's "type" value
 * @method WacSystemParameter setValue()      Sets the current record's "value" value
 * @method WacSystemParameter setPrStr1()     Sets the current record's "pr_str1" value
 * @method WacSystemParameter setPrStr2()     Sets the current record's "pr_str2" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacSystemParameter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_system_parameter');
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
        $this->hasColumn('type', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('value', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
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
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}