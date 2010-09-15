<?php


class WacSystemParameterTable extends PluginWacSystemParameterTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacSystemParameter');
    }
}