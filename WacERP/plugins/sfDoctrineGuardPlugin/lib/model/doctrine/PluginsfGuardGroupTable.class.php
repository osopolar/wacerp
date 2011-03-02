<?php

/**
 * Group table.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage model
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardGroupTable.class.php 23793 2009-11-11 17:42:50Z Kris.Wallsmith $
 */
abstract class PluginsfGuardGroupTable extends WacCommonTable
{
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
