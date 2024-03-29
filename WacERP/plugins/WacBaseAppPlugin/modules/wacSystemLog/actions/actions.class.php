<?php

/**
 * SystemLog actions.
 *
 * @package    Wac
 * @subpackage country
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class wacSystemLogActions extends WacModuleAction
{
    /*
     * override filter list
     */
    public function filterList($listObjs) {
        $filterArr = array();
        if (count($listObjs) > 0) {
            foreach ($listObjs as $listObj) {
                $tmpArr = $listObj->toArray();
                $tmpArr['user_name'] = $listObj->getUser()->getUsername();
                $tmpArr['type']      = $this->i18n->__(WacLogger::getInstance()->getCaptionById($listObj->getType()));

                $filterArr[] = $tmpArr;
            }
        }

        return $filterArr;
    }

}