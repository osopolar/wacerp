<?php

//require_once 'D:\\WebAppChina\\Framework\\PHP\\Symfony\\symfony1.4\\lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../../../../Framework/PHP/Symfony/symfony1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');

    $this->enablePlugins('WacBaseAppPlugin');

    $this->setupCorePluginsCustomConfig();

  }

  public function setupCorePluginsCustomConfig() {
// custom builder options for doctrine
      sfConfig::set('doctrine_model_builder_options',
                    array('baseTableClassName' => 'WacCommonTable',
                          'baseClassName' => 'sfDoctrineRecord'));

  }

}
