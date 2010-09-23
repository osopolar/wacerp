<?php


class WacWorkflowTable extends PluginWacWorkflowTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacWorkflow');
    }
}