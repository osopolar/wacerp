<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacStorehouseMaterialQuantity', 'wac_db_connection1');

/**
 * BaseWacStorehouseMaterialQuantity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $storehouse_id
 * @property integer $storeroom_id
 * @property integer $material_id
 * @property float $qty
 * @property string $qty_unit_code
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property string $pr_str1
 * @property string $pr_str2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property WacStorehouse $Storehouse
 * @property WacStoreroom $Storeroom
 * @property WacMaterial $Material
 * 
 * @method integer                       getId()            Returns the current record's "id" value
 * @method integer                       getStorehouseId()  Returns the current record's "storehouse_id" value
 * @method integer                       getStoreroomId()   Returns the current record's "storeroom_id" value
 * @method integer                       getMaterialId()    Returns the current record's "material_id" value
 * @method float                         getQty()           Returns the current record's "qty" value
 * @method string                        getQtyUnitCode()   Returns the current record's "qty_unit_code" value
 * @method integer                       getPrInt1()        Returns the current record's "pr_int1" value
 * @method integer                       getPrInt2()        Returns the current record's "pr_int2" value
 * @method string                        getPrStr1()        Returns the current record's "pr_str1" value
 * @method string                        getPrStr2()        Returns the current record's "pr_str2" value
 * @method integer                       getPriority()      Returns the current record's "priority" value
 * @method integer                       getIsAvail()       Returns the current record's "is_avail" value
 * @method timestamp                     getCreatedAt()     Returns the current record's "created_at" value
 * @method timestamp                     getUpdatedAt()     Returns the current record's "updated_at" value
 * @method WacStorehouse                 getStorehouse()    Returns the current record's "Storehouse" value
 * @method WacStoreroom                  getStoreroom()     Returns the current record's "Storeroom" value
 * @method WacMaterial                   getMaterial()      Returns the current record's "Material" value
 * @method WacStorehouseMaterialQuantity setId()            Sets the current record's "id" value
 * @method WacStorehouseMaterialQuantity setStorehouseId()  Sets the current record's "storehouse_id" value
 * @method WacStorehouseMaterialQuantity setStoreroomId()   Sets the current record's "storeroom_id" value
 * @method WacStorehouseMaterialQuantity setMaterialId()    Sets the current record's "material_id" value
 * @method WacStorehouseMaterialQuantity setQty()           Sets the current record's "qty" value
 * @method WacStorehouseMaterialQuantity setQtyUnitCode()   Sets the current record's "qty_unit_code" value
 * @method WacStorehouseMaterialQuantity setPrInt1()        Sets the current record's "pr_int1" value
 * @method WacStorehouseMaterialQuantity setPrInt2()        Sets the current record's "pr_int2" value
 * @method WacStorehouseMaterialQuantity setPrStr1()        Sets the current record's "pr_str1" value
 * @method WacStorehouseMaterialQuantity setPrStr2()        Sets the current record's "pr_str2" value
 * @method WacStorehouseMaterialQuantity setPriority()      Sets the current record's "priority" value
 * @method WacStorehouseMaterialQuantity setIsAvail()       Sets the current record's "is_avail" value
 * @method WacStorehouseMaterialQuantity setCreatedAt()     Sets the current record's "created_at" value
 * @method WacStorehouseMaterialQuantity setUpdatedAt()     Sets the current record's "updated_at" value
 * @method WacStorehouseMaterialQuantity setStorehouse()    Sets the current record's "Storehouse" value
 * @method WacStorehouseMaterialQuantity setStoreroom()     Sets the current record's "Storeroom" value
 * @method WacStorehouseMaterialQuantity setMaterial()      Sets the current record's "Material" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacStorehouseMaterialQuantity extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_storehouse_material_quantity');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
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
        $this->hasColumn('storeroom_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
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
        $this->hasColumn('qty_unit_code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
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

        $this->hasOne('WacStoreroom as Storeroom', array(
             'local' => 'storeroom_id',
             'foreign' => 'id'));

        $this->hasOne('WacMaterial as Material', array(
             'local' => 'material_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}