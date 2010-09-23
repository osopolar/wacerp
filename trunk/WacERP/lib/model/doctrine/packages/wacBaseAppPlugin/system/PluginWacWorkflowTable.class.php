<?php


class PluginWacWorkflowTable extends WacCommonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacWorkflow');
    }
}