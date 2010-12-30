<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head id="wac_app_head">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php echo __('Title', array(), 'messages') ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    <script type="text/javascript">
        var BASE_URL = '<?php echo $sf_request->getUriPrefix().url_for('@homepage'); ?>';
    </script>

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body id="wacAppController">
    <?php echo $sf_content ?>
  </body>
</html>
