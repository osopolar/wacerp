<?php

/**
 * Group model.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage model
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardGroup.class.php 23793 2009-11-11 17:42:50Z Kris.Wallsmith $
 */
abstract class PluginsfGuardGroup extends BasesfGuardGroup
{
    public function getPermissionsNames($isArr=false, $separator=',')
    {
        return $this->getPermissionsAttribute("description", $isArr, $separator);
    }

    public function getPermissionsIds($isArr=false, $separator=',')
    {
        return $this->getPermissionsAttribute("id", $isArr, $separator);
    }

    public function getPermissionsAttribute($attribute, $isArr=false, $separator=',')
    {
        $tmpArr = array();
        $groups = $this->getPermissions();
        if($groups->count()>0)
        {
            foreach($groups as $group)
            {
                $method = "get".ucfirst($attribute);
                $tmpArr[] = $group->$method();
            }
        }

        if(!$isArr)
        {
            return implode($separator, $tmpArr);
        }

        return $tmpArr;
    }
}
