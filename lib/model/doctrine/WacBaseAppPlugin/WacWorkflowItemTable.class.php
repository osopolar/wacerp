<?php


class WacWorkflowItemTable extends PluginWacWorkflowItemTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacWorkflowItem');
    }
}