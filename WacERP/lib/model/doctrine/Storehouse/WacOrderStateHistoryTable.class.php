<?php

/**
 * WacOrderStateHistoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacOrderStateHistoryTable extends PluginWacOrderStateHistoryTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacOrderStateHistoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacOrderStateHistory');
    }
}