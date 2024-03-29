<?php

/**
 * PluginWacSystemParameterTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginWacSystemParameterTable extends WacCommonTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginWacSystemParameterTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacSystemParameter');
    }

    /*
     * return value
     */
    public function getOneByCode($code, $isArr=true)
    {
        $conditions = array();
        $conditions['andWhere'][] = "code='{$code}'";

        return $this->getOneByParams($conditions, $isArr);
    }
}