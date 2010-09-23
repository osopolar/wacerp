<?php


class WacSystemLogTable extends PluginWacSystemLogTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacSystemLog');
    }
}