<?php


class PluginWacUnitTypeTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacUnitType');
    }
}