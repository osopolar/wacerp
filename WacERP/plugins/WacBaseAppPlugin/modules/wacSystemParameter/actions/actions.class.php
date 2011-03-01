<?php

/**
 * wacSystemParameterActions actions.
 *
 * @package    Wac
 * @subpackage country
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class wacSystemParameterActions extends WacCommonActions
{
    /*
     * override filter list
     */
    public function filterList($listObjs) {
        $filterArr = array();
        if (count($listObjs) > 0) {
            foreach ($listObjs as $listObj) {
                $tmpArr = $listObj->toArray();
                $tmpArr['type'] = $this->i18n->__(WacDataType::getInstance()->getCaptionById($listObj->getType()));

                $filterArr[] = $tmpArr;
            }
        }

        return $filterArr;
    }

}