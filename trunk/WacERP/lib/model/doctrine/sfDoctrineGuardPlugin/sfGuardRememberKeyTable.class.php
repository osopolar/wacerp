<?php


//class sfGuardRememberKeyTable extends PluginsfGuardRememberKeyTable
class sfGuardRememberKeyTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardRememberKey');
    }
}