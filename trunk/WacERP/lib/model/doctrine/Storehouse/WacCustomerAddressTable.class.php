<?php

/**
 * WacCustomerAddressTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacCustomerAddressTable extends PluginWacCustomerAddressTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacCustomerAddressTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacCustomerAddress');
    }
}