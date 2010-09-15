<?php


class WacSysmsgTable extends PluginWacSysmsgTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacSysmsg');
    }
}