<?php


class PluginWacSysmsgTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacSysmsg');
    }
}