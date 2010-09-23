<?php


class PluginWacSystemParameterTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacSystemParameter');
    }
}