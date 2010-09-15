<?php


class PluginWacSystemLogTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacSystemLog');
    }
}