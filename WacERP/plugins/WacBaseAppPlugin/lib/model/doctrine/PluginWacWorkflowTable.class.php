<?php

/**
 * PluginWacWorkflowTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginWacWorkflowTable extends WacCommonTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginWacWorkflowTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacWorkflow');
    }
}