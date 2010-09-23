<?php


class WacUnitRatioTable extends PluginWacUnitRatioTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacUnitRatio');
    }
}