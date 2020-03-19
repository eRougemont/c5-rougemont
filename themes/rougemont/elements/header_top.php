<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php  Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : '')); ?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/teinte.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/all.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/rougemont.css" />
    <!--
<?php echo dirname($c->getCollectionPath()); ?>
    -->
  </head>
<body>

<div id="" class="<?php  echo $c->getPageWrapperClass()?>">
