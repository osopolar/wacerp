<?php


class WacUnitTypeTable extends PluginWacUnitTypeTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacUnitType');
    }
}