<?php


class PluginWacUnitTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacUnit');
    }
}