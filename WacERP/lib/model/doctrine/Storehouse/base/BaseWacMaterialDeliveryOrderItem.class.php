<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacMaterialDeliveryOrderItem', 'wac_db_connection1');

/**
 * BaseWacMaterialDeliveryOrderItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $order_id
 * @property integer $material_id
 * @property float $qty
 * @property string $qty_unit_code
 * @property decimal $unit_price
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property string $pr_str1
 * @property string $pr_str2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * 
 * @method integer                      getId()            Returns the current record's "id" value
 * @method integer                      getOrderId()       Returns the current record's "order_id" value
 * @method integer                      getMaterialId()    Returns the current record's "material_id" value
 * @method float                        getQty()           Returns the current record's "qty" value
 * @method string                       getQtyUnitCode()   Returns the current record's "qty_unit_code" value
 * @method decimal                      getUnitPrice()     Returns the current record's "unit_price" value
 * @method integer                      getPrInt1()        Returns the current record's "pr_int1" value
 * @method integer                      getPrInt2()        Returns the current record's "pr_int2" value
 * @method string                       getPrStr1()        Returns the current record's "pr_str1" value
 * @method string                       getPrStr2()        Returns the current record's "pr_str2" value
 * @method integer                      getPriority()      Returns the current record's "priority" value
 * @method integer                      getIsAvail()       Returns the current record's "is_avail" value
 * @method timestamp                    getCreatedAt()     Returns the current record's "created_at" value
 * @method timestamp                    getUpdatedAt()     Returns the current record's "updated_at" value
 * @method WacMaterialDeliveryOrderItem setId()            Sets the current record's "id" value
 * @method WacMaterialDeliveryOrderItem setOrderId()       Sets the current record's "order_id" value
 * @method WacMaterialDeliveryOrderItem setMaterialId()    Sets the current record's "material_id" value
 * @method WacMaterialDeliveryOrderItem setQty()           Sets the current record's "qty" value
 * @method WacMaterialDeliveryOrderItem setQtyUnitCode()   Sets the current record's "qty_unit_code" value
 * @method WacMaterialDeliveryOrderItem setUnitPrice()     Sets the current record's "unit_price" value
 * @method WacMaterialDeliveryOrderItem setPrInt1()        Sets the current record's "pr_int1" value
 * @method WacMaterialDeliveryOrderItem setPrInt2()        Sets the current record's "pr_int2" value
 * @method WacMaterialDeliveryOrderItem setPrStr1()        Sets the current record's "pr_str1" value
 * @method WacMaterialDeliveryOrderItem setPrStr2()        Sets the current record's "pr_str2" value
 * @method WacMaterialDeliveryOrderItem setPriority()      Sets the current record's "priority" value
 * @method WacMaterialDeliveryOrderItem setIsAvail()       Sets the current record's "is_avail" value
 * @method WacMaterialDeliveryOrderItem setCreatedAt()     Sets the current record's "created_at" value
 * @method WacMaterialDeliveryOrderItem setUpdatedAt()     Sets the current record's "updated_at" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacMaterialDeliveryOrderItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_material_delivery_order_item');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('order_id', 'integer', 8, array(
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
             'default' => '0',
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
        $this->hasColumn('unit_price', 'decimal', 10, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 10,
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
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}