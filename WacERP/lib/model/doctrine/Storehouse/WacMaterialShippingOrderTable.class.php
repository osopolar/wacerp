<?php

/**
 * WacMaterialShippingOrderTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacMaterialShippingOrderTable extends PluginWacMaterialShippingOrderTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacMaterialShippingOrderTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacMaterialShippingOrder');
    }
}