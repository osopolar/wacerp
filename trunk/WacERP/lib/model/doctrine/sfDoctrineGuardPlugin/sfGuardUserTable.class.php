<?php


//class sfGuardUserTable extends PluginsfGuardUserTable
class sfGuardUserTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
}