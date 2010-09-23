<?php


class PluginWacCurrencyTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacCurrency');
    }
}