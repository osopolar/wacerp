<?php


//class sfGuardGroupTable extends PluginsfGuardGroupTable
class sfGuardGroupTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardGroup');
    }
}