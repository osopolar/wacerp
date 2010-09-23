<?php


//class sfGuardUserGroupTable extends PluginsfGuardUserGroupTable
class sfGuardUserGroupTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUserGroup');
    }
}