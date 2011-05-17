<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('WacMaterialCategoryLink', 'wac_db_connection1');

/**
 * BaseWacMaterialCategoryLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $material_id
 * @property integer $category_id
 * @property integer $pr_int1
 * @property integer $pr_int2
 * @property string $pr_str1
 * @property string $pr_str2
 * @property integer $priority
 * @property integer $is_avail
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * 
 * @method integer                 getId()          Returns the current record's "id" value
 * @method integer                 getMaterialId()  Returns the current record's "material_id" value
 * @method integer                 getCategoryId()  Returns the current record's "category_id" value
 * @method integer                 getPrInt1()      Returns the current record's "pr_int1" value
 * @method integer                 getPrInt2()      Returns the current record's "pr_int2" value
 * @method string                  getPrStr1()      Returns the current record's "pr_str1" value
 * @method string                  getPrStr2()      Returns the current record's "pr_str2" value
 * @method integer                 getPriority()    Returns the current record's "priority" value
 * @method integer                 getIsAvail()     Returns the current record's "is_avail" value
 * @method timestamp               getCreatedAt()   Returns the current record's "created_at" value
 * @method timestamp               getUpdatedAt()   Returns the current record's "updated_at" value
 * @method WacMaterialCategoryLink setId()          Sets the current record's "id" value
 * @method WacMaterialCategoryLink setMaterialId()  Sets the current record's "material_id" value
 * @method WacMaterialCategoryLink setCategoryId()  Sets the current record's "category_id" value
 * @method WacMaterialCategoryLink setPrInt1()      Sets the current record's "pr_int1" value
 * @method WacMaterialCategoryLink setPrInt2()      Sets the current record's "pr_int2" value
 * @method WacMaterialCategoryLink setPrStr1()      Sets the current record's "pr_str1" value
 * @method WacMaterialCategoryLink setPrStr2()      Sets the current record's "pr_str2" value
 * @method WacMaterialCategoryLink setPriority()    Sets the current record's "priority" value
 * @method WacMaterialCategoryLink setIsAvail()     Sets the current record's "is_avail" value
 * @method WacMaterialCategoryLink setCreatedAt()   Sets the current record's "created_at" value
 * @method WacMaterialCategoryLink setUpdatedAt()   Sets the current record's "updated_at" value
 * 
 * @package    WacERP
 * @subpackage model
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWacMaterialCategoryLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wac_material_cateogry_link');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('material_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('category_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
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