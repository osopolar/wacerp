<?php


class PluginWacCountryTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacCountry');
    }
}