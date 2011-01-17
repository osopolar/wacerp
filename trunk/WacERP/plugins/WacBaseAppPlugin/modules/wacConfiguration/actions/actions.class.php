<?php

/**
 * wacI18n actions.
 *
 * @package    WacERP
 * @subpackage wacI18n
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacConfigurationActions extends WacCommonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->forward404();
  }

  public function executeGetFrontendEnvSetting(sfWebRequest $request)
  {
      $str = "";
      $frontendConfigs = array();
      $requiredKeys = array("wac_setting", "wac_events");
      $frontendConfigs = $this->getRequireVars($requiredKeys);
//      $str = print_r($frontendConfigs, true);
      $str = $this->getPartial("jsVars", array("frontendConfigs"=>$frontendConfigs));

      return OutputHelper::getInstance()->output($str, $this);
  }

  private function getRequireVars($requiredKeys){
      $result = array();
      $appConfigs = sfConfig::getAll();
//      print_r(sfConfig::getAll());
      if(count($appConfigs)>0){
          foreach($appConfigs as $k=>$v){
              if($this->isContain($k, $requiredKeys)){
                  $result[$k] = $v;
              }
          }
      }
      return $result;
  }

  private function isContain($k, $requiredKeys){
      $result = false;
      if(count($requiredKeys)>0){
          foreach($requiredKeys as $key){
              if(!(strpos($k, $key)===false)){
                  $result = true;
                  break;
              }
          }
      }
      return $result;
  }

}