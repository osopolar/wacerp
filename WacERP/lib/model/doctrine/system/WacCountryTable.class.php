<?php


class WacCountryTable extends PluginWacCountryTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacCountry');
    }
}