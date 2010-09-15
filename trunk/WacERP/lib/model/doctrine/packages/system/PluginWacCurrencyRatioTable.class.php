<?php


class PluginWacCurrencyRatioTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacCurrencyRatio');
    }
}