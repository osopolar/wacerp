<?php


class WacUnitTable extends PluginWacUnitTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacUnit');
    }
}