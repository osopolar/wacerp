<?php


class PluginWacUnitRatioTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacUnitRatio');
    }
}