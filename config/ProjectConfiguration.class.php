<?php

require_once '/home/waelb/dev/symfony/v1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{

  public function setup()
  {
    $this->enablePlugins(array(
    'sfDoctrinePlugin', 
    'sfDoctrineGuardPlugin',
    'sfFormExtraPlugin'
  ));
  }

  static protected $zendLoaded = false;

  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }

    set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
    require_once sfConfig::get('sf_lib_dir') . '/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }

}
