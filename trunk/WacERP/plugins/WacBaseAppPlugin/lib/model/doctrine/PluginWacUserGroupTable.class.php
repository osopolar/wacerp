<?php

/**
 * PluginWacUserGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginWacUserGroupTable extends sfGuardUserGroupTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginWacUserGroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginWacUserGroup');
    }

    /*
     * judge the attribute is existed or not
     * @return boolean
     */
    public function isExistedAttribute($attribute, $val, $exceptId=0, $igroneStatus=true)
    {
        if($exceptId==0)
        {
            $objQuery = $this->createQuery('t1')
             ->select("count(*) as total")
             ->where("t1.{$attribute}='{$val}'");
        }
        else
        {
            $objQuery = $this->createQuery('t1')
             ->select("count(*) as total")
             ->where("t1.{$attribute}='{$val}' and t1.id<>'{$exceptId}'");
        }
        $dataResult = $objQuery->fetchOne();
        $objQuery->free();
        return ($dataResult['total']>0);
    }

    /*
     * judge the name is existed or not
     * @return boolean
     */
    public function isExistedName($val, $exceptId=0)
    {
        return $this->isExistedAttribute("name", $val, $exceptId);
    }

    /*
     *  return id=>description hash
    */
    public function getIdDescriptionHash() {
        return $this->getHashList("id", "description");
    }
}