<?php

/**
 * WacUserGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacUserGroupTable extends PluginWacUserGroupTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacUserGroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacUserGroup');
    }
}