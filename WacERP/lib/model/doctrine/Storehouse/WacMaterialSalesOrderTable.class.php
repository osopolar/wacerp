<?php

/**
 * WacMaterialSalesOrderTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacMaterialSalesOrderTable extends PluginWacMaterialSalesOrderTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacMaterialSalesOrderTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacMaterialSalesOrder');
    }
}