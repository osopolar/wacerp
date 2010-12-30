<?php


class WacCurrencyTable extends PluginWacCurrencyTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacCurrency');
    }
}