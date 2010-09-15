<?php


class PluginWacTemplateTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacTemplate');
    }
}