<?php

/**
 * materialPurchase actions.
 *
 * @package    WacERP
 * @subpackage materialPurchase
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materialPurchaseActions extends WacModuleAction {

    /*
     * override parent method to map the corresponding module table
     */
    public function getModuleTableName(){
        return WacModuleHelper::getModuleTableName($this->innerContextInfo["moduleName"], "WacMaterialPurchaseOrder");
    }
    
}
