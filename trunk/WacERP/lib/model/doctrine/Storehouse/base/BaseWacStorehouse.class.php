<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacStorehouse', 'wac_db_connection1');

/**
 * BaseWacStorehouse
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property float $area_size
 * @property string $area_size_unit_code
 * @property float $capacity
 * @property string $capacity_unit_code
 * @property string $postalcode
 * @property string $address
 * @property string $contact_man
 * @property string $tel1
 * @property string $tel2
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property string $pr_str1
 * @property string $pr_str2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $MaterialDeliveryOrder
 * @property Doctrine_Collection $MaterialSaleOrder
 * @property Doctrine_Collection $MaterialShippingOrder
 * @property Doctrine_Collection $MaterialBizItems
 * @property Doctrine_Collection $MaterialQuantity
 * @property Doctrine_Collection $Params
 * @property Doctrine_Collection $WacStorehouseQuickstat
 * @property Doctrine_Collection $WacStoreroom
 * 
 * @method integer             getId()                     Returns the current record's "id" value
 * @method string              getName()                   Returns the current record's "name" value
 * @method string              getCode()                   Returns the current record's "code" value
 * @method float               getAreaSize()               Returns the current record's "area_size" value
 * @method string              getAreaSizeUnitCode()       Returns the current record's "area_size_unit_code" value
 * @method float               getCapacity()               Returns the current record's "capacity" value
 * @method string              getCapacityUnitCode()       Returns the current record's "capacity_unit_code" value
 * @method string              getPostalcode()             Returns the current record's "postalcode" value
 * @method string              getAddress()                Returns the current record's "address" value
 * @method string              getContactMan()             Returns the current record's "contact_man" value
 * @method string              getTel1()                   Returns the current record's "tel1" value
 * @method string              getTel2()                   Returns the current record's "tel2" value
 * @method integer             getPrInt1()                 Returns the current record's "pr_int1" value
 * @method integer             getPrInt2()                 Returns the current record's "pr_int2" value
 * @method string              getPrStr1()                 Returns the current record's "pr_str1" value
 * @method string              getPrStr2()                 Returns the current record's "pr_str2" value
 * @method integer             getPriority()               Returns the current record's "priority" value
 * @method integer             getIsAvail()                Returns the current record's "is_avail" value
 * @method timestamp           getCreatedAt()              Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()              Returns the current record's "updated_at" value
 * @method Doctrine_Collection getMaterialDeliveryOrder()  Returns the current record's "MaterialDeliveryOrder" collection
 * @method Doctrine_Collection getMaterialSaleOrder()      Returns the current record's "MaterialSaleOrder" collection
 * @method Doctrine_Collection getMaterialShippingOrder()  Returns the current record's "MaterialShippingOrder" collection
 * @method Doctrine_Collection getMaterialBizItems()       Returns the current record's "MaterialBizItems" collection
 * @method Doctrine_Collection getMaterialQuantity()       Returns the current record's "MaterialQuantity" collection
 * @method Doctrine_Collection getParams()                 Returns the current record's "Params" collection
 * @method Doctrine_Collection getWacStorehouseQuickstat() Returns the current record's "WacStorehouseQuickstat" collection
 * @method Doctrine_Collection getWacStoreroom()           Returns the current record's "WacStoreroom" collection
 * @method WacStorehouse       setId()                     Sets the current record's "id" value
 * @method WacStorehouse       setName()                   Sets the current record's "name" value
 * @method WacStorehouse       setCode()                   Sets the current record's "code" value
 * @method WacStorehouse       setAreaSize()               Sets the current record's "area_size" value
 * @method WacStorehouse       setAreaSizeUnitCode()       Sets the current record's "area_size_unit_code" value
 * @method WacStorehouse       setCapacity()               Sets the current record's "capacity" value
 * @method WacStorehouse       setCapacityUnitCode()       Sets the current record's "capacity_unit_code" value
 * @method WacStorehouse       setPostalcode()             Sets the current record's "postalcode" value
 * @method WacStorehouse       setAddress()                Sets the current record's "address" value
 * @method WacStorehouse       setContactMan()             Sets the current record's "contact_man" value
 * @method WacStorehouse       setTel1()                   Sets the current record's "tel1" value
 * @method WacStorehouse       setTel2()                   Sets the current record's "tel2" value
 * @method WacStorehouse       setPrInt1()                 Sets the current record's "pr_int1" value
 * @method WacStorehouse       setPrInt2()                 Sets the current record's "pr_int2" value
 * @method WacStorehouse       setPrStr1()                 Sets the current record's "pr_str1" value
 * @method WacStorehouse       setPrStr2()                 Sets the current record's "pr_str2" value
 * @method WacStorehouse       setPriority()               Sets the current record's "priority" value
 * @method WacStorehouse       setIsAvail()                Sets the current record's "is_avail" value
 * @method WacStorehouse       setCreatedAt()              Sets the current record's "created_at" value
 * @method WacStorehouse       setUpdatedAt()              Sets the current record's "updated_at" value
 * @method WacStorehouse       setMaterialDeliveryOrder()  Sets the current record's "MaterialDeliveryOrder" collection
 * @method WacStorehouse       setMaterialSaleOrder()      Sets the current record's "MaterialSaleOrder" collection
 * @method WacStorehouse       setMaterialShippingOrder()  Sets the current record's "MaterialShippingOrder" collection
 * @method WacStorehouse       setMaterialBizItems()       Sets the current record's "MaterialBizItems" collection
 * @method WacStorehouse       setMaterialQuantity()       Sets the current record's "MaterialQuantity" collection
 * @method WacStorehouse       setParams()                 Sets the current record's "Params" collection
 * @method WacStorehouse       setWacStorehouseQuickstat() Sets the current record's "WacStorehouseQuickstat" collection
 * @method WacStorehouse       setWacStoreroom()           Sets the current record's "WacStoreroom" collection
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacStorehouse extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_storehouse');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('area_size', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('area_size_unit_code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('capacity', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('capacity_unit_code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('postalcode', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('contact_man', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('tel1', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('tel2', 'string', 255, array(
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
        $this->hasMany('WacMaterialDeliveryOrder as MaterialDeliveryOrder', array(
             'local' => 'id',
             'foreign' => 'src_storehouse_id'));

        $this->hasMany('WacMaterialSaleOrder as MaterialSaleOrder', array(
             'local' => 'id',
             'foreign' => 'src_storehouse_id'));

        $this->hasMany('WacMaterialShippingOrder as MaterialShippingOrder', array(
             'local' => 'id',
             'foreign' => 'src_storehouse_id'));

        $this->hasMany('WacStorehouseMaterialBizItem as MaterialBizItems', array(
             'local' => 'id',
             'foreign' => 'storehouse_id'));

        $this->hasMany('WacStorehouseMaterialQuantity as MaterialQuantity', array(
             'local' => 'id',
             'foreign' => 'storehouse_id'));

        $this->hasMany('WacStorehouseParameter as Params', array(
             'local' => 'id',
             'foreign' => 'storehouse_id'));

        $this->hasMany('WacStorehouseQuickstat', array(
             'local' => 'id',
             'foreign' => 'storehouse_id'));

        $this->hasMany('WacStoreroom', array(
             'local' => 'id',
             'foreign' => 'storehouse_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}