<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head id="wac_app_head">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php echo __('Title', array(), 'messages') ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body id="wacAppController">
    <?php echo $sf_content ?>

    <?php
      OutputHelper::getInstance()->writeNote("Declare public ToolkitWidgets, begin");
      include_component_slot('dataExportWidget'); // for data export
      include_component_slot('printWidget'); // for print
      OutputHelper::getInstance()->writeNote("Declare public ToolkitWidgets, end");
    ?>

  </body>
</html>
