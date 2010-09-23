<?php


//class sfGuardGroupPermissionTable extends PluginsfGuardGroupPermissionTable
class sfGuardGroupPermissionTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardGroupPermission');
    }
}