<?php

/**
 * WacStoreroomTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacStoreroomTable extends PluginWacStoreroomTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacStoreroomTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacStoreroom');
    }
}