<?php


class WacTemplateTable extends PluginWacTemplateTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacTemplate');
    }
}