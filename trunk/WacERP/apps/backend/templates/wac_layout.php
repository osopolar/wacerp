<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head id="wac_app_head">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php echo __('Title', array(), 'messages') ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    
    <?php 
    echo "<script type=\"text/javascript\" src=\"".$sf_request->getUriPrefix().url_for('@homepage')."wacConfiguration/getFrontendEnvSetting/dataFormat/pureText\"></script>\n";
    ?>

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body id="wacAppController">
    <?php echo $sf_content ?>

    <!-- ToolkitWidgets, begin -->
    <?php include_component_slot('dataExportWidget') ?>
    <!-- ToolkitWidgets, end -->
  </body>
</html>
