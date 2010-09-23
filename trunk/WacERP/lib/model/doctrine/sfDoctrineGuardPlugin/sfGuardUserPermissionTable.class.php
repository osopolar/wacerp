<?php


//class sfGuardUserPermissionTable extends PluginsfGuardUserPermissionTable
class sfGuardUserPermissionTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUserPermission');
    }
}