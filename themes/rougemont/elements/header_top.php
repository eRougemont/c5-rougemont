<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : '')); ?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/teinte.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/all.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/rougemont.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166319083-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-166319083-1');
    </script>
    <!--
getCollectionPath = <?php echo $c->getCollectionPath(); ?>
getCollectionName = <?php echo $c->getCollectionName(); ?>
getCollectionID = <?php echo $c->getCollectionID(); ?>
    -->
  </head>
<body>
<?php 
$md = new Mobile_Detect();
$mobile = $md->isMobile();
?>
<div id="" class="<?php
echo $c->getPageWrapperClass();
$parent = trim(dirname($c->getCollectionPath()), " /");
if (preg_match('@[a-z]+@', $parent)) echo ' parent-',$parent;
echo ' ',basename($c->getCollectionPath());

?>">
