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
      $frontendConfigs["wac_setting"] = $this->getRequireVars(array("wac_setting"));
      $frontendConfigs["wac_events"] = $this->getRequireVars(array("wac_events"));

//      $str = print_r($frontendConfigs, true);
      $str = $this->getPartial("jsFrontendEnvSetting", array("frontendConfigs"=>$frontendConfigs));

      return OutputHelper::getInstance()->output($str, $this, array("isCache"=>true));
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
