<?php

/**
 * WacSupplierTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacSupplierTable extends PluginWacSupplierTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacSupplierTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacSupplier');
    }
}