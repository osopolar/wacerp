<?php

/**
 * WacUserParameterTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WacUserParameterTable extends PluginWacUserParameterTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object WacUserParameterTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WacUserParameter');
    }
}