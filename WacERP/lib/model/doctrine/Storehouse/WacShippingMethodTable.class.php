<?php

/**
 * WacShippingMethodTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacShippingMethodTable extends PluginWacShippingMethodTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacShippingMethodTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacShippingMethod');
    }
}