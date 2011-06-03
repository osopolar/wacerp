<?php

/**
 * PluginWacSysmsgTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginWacSysmsgTable extends WacCommonTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginWacSysmsgTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacSysmsg');
    }

    public function getErrContent($code, $params=array()){
        $content = $this->getContentByCode($code);
        return vsprintf($content, $params);
    }

    /*
     * return value
     */
    public function getContentByCode($code)
    {
        $conditions = array();
        $conditions['andWhere'][] = "culture_code='".sfContext::getInstance()->getUser()->getCulture()."'";
        $conditions['andWhere'][] = "code='{$code}'";
        
        return $this->fetchAttribute("content", $conditions);
    }
}