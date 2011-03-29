<?php

/**
 * User table.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage model
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardUserTable.class.php 23793 2009-11-11 17:42:50Z Kris.Wallsmith $
 */
abstract class PluginsfGuardUserTable extends WacCommonTable
{
  /**
   * Retrieves a sfGuardUser object by username and is_active flag.
   *
   * @param  string  $username The username
   * @param  boolean $isActive The user's status
   *
   * @return sfGuardUser
   */
  public function retrieveByUsername($username, $isActive = true)
  {
    $query = Doctrine::getTable('sfGuardUser')->createQuery('u')
      ->where('u.username = ?', $username)
      ->addWhere('u.is_active = ?', $isActive)
    ;

    return $query->fetchOne();
  }

//  /*
//     * judge the attribute is existed or not
//     * @return boolean
//     */
////    public function isExistedAttribute($attribute, $val, $exceptId=0)
////    {
////        if($exceptId==0)
////        {
////            $objQuery = $this->createQuery('t1')
////             ->select("count(*) as total")
////             ->where("t1.is_active=1 and t1.{$attribute}='{$val}'");
////        }
////        else
////        {
////            $objQuery = $this->createQuery('t1')
////             ->select("count(*) as total")
////             ->where("t1.is_active=1 and t1.{$attribute}='{$val}' and t1.id<>'{$exceptId}'");
////        }
////        $dataResult = $objQuery->fetchOne();
////        $objQuery->free();
////        return ($dataResult['total']>0);
////    }
//  public function isExistedAttribute($attribute, $val, $exceptId=0, $igroneStatus=true)
//    {
//        $conditionStr = $igroneStatus ? "":" t1.is_active=1 and ";
//        if($exceptId==0)
//        {
//            $objQuery = $this->createQuery('t1')
//             ->select("count(*) as total")
//             ->where("{$conditionStr} t1.{$attribute}='{$val}'");
//        }
//        else
//        {
//            $objQuery = $this->createQuery('t1')
//             ->select("count(*) as total")
//             ->where("{$conditionStr} t1.{$attribute}='{$val}' and t1.id<>'{$exceptId}'");
//        }
//        $dataResult = $objQuery->fetchOne();
//        $objQuery->free();
//        return ($dataResult['total']>0);
//    }
//
//    /*
//     * judge the name is existed or not
//     * @return boolean
//     */
//    public function isExistedName($val, $exceptId=0, $igroneStatus=true)
//    {
//        return $this->isExistedAttribute("username", $val, $exceptId, $igroneStatus);
//    }
}
