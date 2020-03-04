<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php  Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : '')); ?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/teinte.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/rougemont.css" />

    <script src="<?php  echo $view->getThemePath()?>/js/bootstrap.min.js">//</script>

  </head>
<body>

<div class="<?php  echo $c->getPageWrapperClass()?>">
