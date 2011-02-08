<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacWorkflow', 'wac_db_connection1');

/**
 * BaseWacWorkflow
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $type
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
 * @property Doctrine_Collection $WacWorkflowItem
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getType()            Returns the current record's "type" value
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
 * @method Doctrine_Collection getWacWorkflowItem() Returns the current record's "WacWorkflowItem" collection
 * @method WacWorkflow         setId()              Sets the current record's "id" value
 * @method WacWorkflow         setType()            Sets the current record's "type" value
 * @method WacWorkflow         setPrInt1()          Sets the current record's "pr_int1" value
 * @method WacWorkflow         setPrInt2()          Sets the current record's "pr_int2" value
 * @method WacWorkflow         setPriority()        Sets the current record's "priority" value
 * @method WacWorkflow         setIsAvail()         Sets the current record's "is_avail" value
 * @method WacWorkflow         setCreatedAt()       Sets the current record's "created_at" value
 * @method WacWorkflow         setUpdatedAt()       Sets the current record's "updated_at" value
 * @method WacWorkflow         setName()            Sets the current record's "name" value
 * @method WacWorkflow         setCode()            Sets the current record's "code" value
 * @method WacWorkflow         setMemo()            Sets the current record's "memo" value
 * @method WacWorkflow         setPrStr1()          Sets the current record's "pr_str1" value
 * @method WacWorkflow         setPrStr2()          Sets the current record's "pr_str2" value
 * @method WacWorkflow         setWacWorkflowItem() Sets the current record's "WacWorkflowItem" collection
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseWacWorkflow extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_workflow');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('type', 'integer', 4, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 4,
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
        $this->hasMany('WacWorkflowItem', array(
             'local' => 'id',
             'foreign' => 'workflow_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}