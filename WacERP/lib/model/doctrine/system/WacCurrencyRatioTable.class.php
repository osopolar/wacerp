<?php


class WacCurrencyRatioTable extends PluginWacCurrencyRatioTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacCurrencyRatio');
    }
}