<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacSystemLog', 'wac_db_connection1');

/**
 * BaseWacSystemLog
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
 * @property integer $user_id
 * @property string $content
 * @property string $pr_str1
 * @property string $pr_str2
 * @property WacGuardUser $user
 * 
 * @method integer      getId()         Returns the current record's "id" value
 * @method integer      getType()       Returns the current record's "type" value
 * @method integer      getPrInt1()     Returns the current record's "pr_int1" value
 * @method integer      getPrInt2()     Returns the current record's "pr_int2" value
 * @method integer      getPriority()   Returns the current record's "priority" value
 * @method integer      getIsAvail()    Returns the current record's "is_avail" value
 * @method timestamp    getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp    getUpdatedAt()  Returns the current record's "updated_at" value
 * @method integer      getUserId()     Returns the current record's "user_id" value
 * @method string       getContent()    Returns the current record's "content" value
 * @method string       getPrStr1()     Returns the current record's "pr_str1" value
 * @method string       getPrStr2()     Returns the current record's "pr_str2" value
 * @method WacGuardUser getUser()       Returns the current record's "user" value
 * @method WacSystemLog setId()         Sets the current record's "id" value
 * @method WacSystemLog setType()       Sets the current record's "type" value
 * @method WacSystemLog setPrInt1()     Sets the current record's "pr_int1" value
 * @method WacSystemLog setPrInt2()     Sets the current record's "pr_int2" value
 * @method WacSystemLog setPriority()   Sets the current record's "priority" value
 * @method WacSystemLog setIsAvail()    Sets the current record's "is_avail" value
 * @method WacSystemLog setCreatedAt()  Sets the current record's "created_at" value
 * @method WacSystemLog setUpdatedAt()  Sets the current record's "updated_at" value
 * @method WacSystemLog setUserId()     Sets the current record's "user_id" value
 * @method WacSystemLog setContent()    Sets the current record's "content" value
 * @method WacSystemLog setPrStr1()     Sets the current record's "pr_str1" value
 * @method WacSystemLog setPrStr2()     Sets the current record's "pr_str2" value
 * @method WacSystemLog setUser()       Sets the current record's "user" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacSystemLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_system_log');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('type', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
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
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('content', 'string', null, array(
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
        $this->hasOne('WacGuardUser as user', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}