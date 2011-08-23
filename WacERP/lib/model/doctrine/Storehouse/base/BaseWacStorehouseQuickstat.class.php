<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacStorehouseQuickstat', 'wac_db_connection1');

/**
 * BaseWacStorehouseQuickstat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $type
 * @property integer $storehouse_id
 * @property integer $material_id
 * @property float $qty
 * @property timestamp $stat_date
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property string $pr_str1
 * @property string $pr_str2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property WacStorehouse $Storehouse
 * @property WacMaterial $Material
 * 
 * @method integer                getId()            Returns the current record's "id" value
 * @method integer                getType()          Returns the current record's "type" value
 * @method integer                getStorehouseId()  Returns the current record's "storehouse_id" value
 * @method integer                getMaterialId()    Returns the current record's "material_id" value
 * @method float                  getQty()           Returns the current record's "qty" value
 * @method timestamp              getStatDate()      Returns the current record's "stat_date" value
 * @method integer                getPrInt1()        Returns the current record's "pr_int1" value
 * @method integer                getPrInt2()        Returns the current record's "pr_int2" value
 * @method string                 getPrStr1()        Returns the current record's "pr_str1" value
 * @method string                 getPrStr2()        Returns the current record's "pr_str2" value
 * @method integer                getPriority()      Returns the current record's "priority" value
 * @method integer                getIsAvail()       Returns the current record's "is_avail" value
 * @method timestamp              getCreatedAt()     Returns the current record's "created_at" value
 * @method timestamp              getUpdatedAt()     Returns the current record's "updated_at" value
 * @method WacStorehouse          getStorehouse()    Returns the current record's "Storehouse" value
 * @method WacMaterial            getMaterial()      Returns the current record's "Material" value
 * @method WacStorehouseQuickstat setId()            Sets the current record's "id" value
 * @method WacStorehouseQuickstat setType()          Sets the current record's "type" value
 * @method WacStorehouseQuickstat setStorehouseId()  Sets the current record's "storehouse_id" value
 * @method WacStorehouseQuickstat setMaterialId()    Sets the current record's "material_id" value
 * @method WacStorehouseQuickstat setQty()           Sets the current record's "qty" value
 * @method WacStorehouseQuickstat setStatDate()      Sets the current record's "stat_date" value
 * @method WacStorehouseQuickstat setPrInt1()        Sets the current record's "pr_int1" value
 * @method WacStorehouseQuickstat setPrInt2()        Sets the current record's "pr_int2" value
 * @method WacStorehouseQuickstat setPrStr1()        Sets the current record's "pr_str1" value
 * @method WacStorehouseQuickstat setPrStr2()        Sets the current record's "pr_str2" value
 * @method WacStorehouseQuickstat setPriority()      Sets the current record's "priority" value
 * @method WacStorehouseQuickstat setIsAvail()       Sets the current record's "is_avail" value
 * @method WacStorehouseQuickstat setCreatedAt()     Sets the current record's "created_at" value
 * @method WacStorehouseQuickstat setUpdatedAt()     Sets the current record's "updated_at" value
 * @method WacStorehouseQuickstat setStorehouse()    Sets the current record's "Storehouse" value
 * @method WacStorehouseQuickstat setMaterial()      Sets the current record's "Material" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacStorehouseQuickstat extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_storehouse_quickstat');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('type', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('storehouse_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('material_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('qty', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('stat_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('pr_int1', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('pr_int2', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('pr_str1', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('pr_str2', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('priority', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '50',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_avail', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('WacStorehouse as Storehouse', array(
             'local' => 'storehouse_id',
             'foreign' => 'id'));

        $this->hasOne('WacMaterial as Material', array(
             'local' => 'material_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}