<?php


class PluginWacWorkflowItemTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacWorkflowItem');
    }
}