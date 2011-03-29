<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacFile', 'wac_db_connection1');

/**
 * BaseWacFile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $parent_id
 * @property integer $position
 * @property integer $left_number
 * @property integer $right_number
 * @property integer $level
 * @property integer $user_id
 * @property integer $size
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property string $type
 * @property string $code
 * @property string $name
 * @property string $caption
 * @property string $file_type
 * @property string $path
 * @property string $memo
 * @property string $pr_str1
 * @property string $pr_str2
 * @property WacUser $user
 * @property WacFile $parent
 * @property Doctrine_Collection $WacFile
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getParentId()     Returns the current record's "parent_id" value
 * @method integer             getPosition()     Returns the current record's "position" value
 * @method integer             getLeftNumber()   Returns the current record's "left_number" value
 * @method integer             getRightNumber()  Returns the current record's "right_number" value
 * @method integer             getLevel()        Returns the current record's "level" value
 * @method integer             getUserId()       Returns the current record's "user_id" value
 * @method integer             getSize()         Returns the current record's "size" value
 * @method integer             getPrInt1()       Returns the current record's "pr_int1" value
 * @method integer             getPrInt2()       Returns the current record's "pr_int2" value
 * @method integer             getPriority()     Returns the current record's "priority" value
 * @method integer             getIsAvail()      Returns the current record's "is_avail" value
 * @method timestamp           getCreatedAt()    Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()    Returns the current record's "updated_at" value
 * @method string              getType()         Returns the current record's "type" value
 * @method string              getCode()         Returns the current record's "code" value
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getCaption()      Returns the current record's "caption" value
 * @method string              getFileType()     Returns the current record's "file_type" value
 * @method string              getPath()         Returns the current record's "path" value
 * @method string              getMemo()         Returns the current record's "memo" value
 * @method string              getPrStr1()       Returns the current record's "pr_str1" value
 * @method string              getPrStr2()       Returns the current record's "pr_str2" value
 * @method WacUser             getUser()         Returns the current record's "user" value
 * @method WacFile             getParent()       Returns the current record's "parent" value
 * @method Doctrine_Collection getWacFile()      Returns the current record's "WacFile" collection
 * @method WacFile             setId()           Sets the current record's "id" value
 * @method WacFile             setParentId()     Sets the current record's "parent_id" value
 * @method WacFile             setPosition()     Sets the current record's "position" value
 * @method WacFile             setLeftNumber()   Sets the current record's "left_number" value
 * @method WacFile             setRightNumber()  Sets the current record's "right_number" value
 * @method WacFile             setLevel()        Sets the current record's "level" value
 * @method WacFile             setUserId()       Sets the current record's "user_id" value
 * @method WacFile             setSize()         Sets the current record's "size" value
 * @method WacFile             setPrInt1()       Sets the current record's "pr_int1" value
 * @method WacFile             setPrInt2()       Sets the current record's "pr_int2" value
 * @method WacFile             setPriority()     Sets the current record's "priority" value
 * @method WacFile             setIsAvail()      Sets the current record's "is_avail" value
 * @method WacFile             setCreatedAt()    Sets the current record's "created_at" value
 * @method WacFile             setUpdatedAt()    Sets the current record's "updated_at" value
 * @method WacFile             setType()         Sets the current record's "type" value
 * @method WacFile             setCode()         Sets the current record's "code" value
 * @method WacFile             setName()         Sets the current record's "name" value
 * @method WacFile             setCaption()      Sets the current record's "caption" value
 * @method WacFile             setFileType()     Sets the current record's "file_type" value
 * @method WacFile             setPath()         Sets the current record's "path" value
 * @method WacFile             setMemo()         Sets the current record's "memo" value
 * @method WacFile             setPrStr1()       Sets the current record's "pr_str1" value
 * @method WacFile             setPrStr2()       Sets the current record's "pr_str2" value
 * @method WacFile             setUser()         Sets the current record's "user" value
 * @method WacFile             setParent()       Sets the current record's "parent" value
 * @method WacFile             setWacFile()      Sets the current record's "WacFile" collection
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseWacFile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_file');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('parent_id', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('position', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('left_number', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('right_number', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('level', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('size', 'integer', 4, array(
             'type' => 'integer',
             'default' => '0',
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
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('code', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('caption', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('file_type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('path', 'string', 255, array(
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
        $this->hasOne('WacUser as user', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('WacFile as parent', array(
             'local' => 'parent_id',
             'foreign' => 'id'));

        $this->hasMany('WacFile', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}