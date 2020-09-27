<?php  
defined('C5_EXECUTE') or die("Access Denied."); 
$u = new User();

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <meta charset="UTF-8"/>
    <meta name="theme-color" content="#cf1308"/>
    <link rel="preconnect" href="https://www.google-analytics.com/"/>
    <link rel="dns-prefetch" href="https://www.google-analytics.com/"/>

    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin/>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/" crossorigin/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin/>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/" crossorigin/>
    <link
      rel="preload" 
      as="style" 
      href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@0;1&family=Fira+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
    />
    <link 
      rel="stylesheet" 
      media="print" 
      onload="this.media='all'" 
      href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@0;1&family=Fira+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
    />
    <noscript>
    <link 
      rel="stylesheet" 
      href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@0;1&family=Fira+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
    />
    </noscript>
    
<?php

/*
Les fontes en local sont plus lentes
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/eb-garamond-v14-latin-ext_latin-italic.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/eb-garamond-v14-latin-ext_latin-regular.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-300italic.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-300.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-500italic.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-500.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-italic.woff2"/>
<link rel="preload" crossorigin as="font" type="font/woff2" href="<?php echo $this->getThemePath(); ?>/fonts/fira-sans-v10-latin-ext_latin_greek-regular.woff2"/>
$this->addHeaderItem($html->css('css/fonts-local.css'));

*/

// les fontes sont demandées vite pour espérer que cela ne perturbe pas la vue, crossorigin est nécessaire
// par contre, il ne faut pas pour google-analytics

$title = $c->getAttribute('meta_title');
if (!$title) $title = $c->getCollectionName();

$html = Loader::helper('html');
$this->addHeaderItem($html->css('css/bootstrap-grid.css'));
$this->addHeaderItem($html->css('css/teinte.css'));
$this->addHeaderItem($html->css('css/rougemont.css'));
Loader::element('header_required', array('pageTitle' => $title." | Rougemont 2.0", 'pageDescription' => isset($pageDescription) ? $pageDescription : ''));

$ld = $c->getAttribute('meta_ld');
if ($ld) echo '<script type="application/ld+json">',"\n",$ld,"\n",'</script>',"\n";

/**
    C5 a besoin de jquery en mode admin (v. 1.12.2 avec ckedditor) et des plugins comme les diaporamas, mais c’est plombant
*/
if ($u->isLoggedIn () || $c->getCollectionPath() == '/bio') {
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>';
}
if ($u->isLoggedIn ()) {
  echo '<link rel="stylesheet" media="screen" type="text/css" href="'.$this->getStyleSheet("css/c5-admin.css").'" />';
}
    ?>
    <link rel="icon" sizes="32x32"    href="<?php  echo $view->getThemePath()?>/img/favicon32.png">
    <link rel="icon" sizes="57x57"    href="<?php  echo $view->getThemePath()?>/img/favicon57.png">
    <link rel="icon" sizes="76x76"    href="<?php  echo $view->getThemePath()?>/img/favicon76.png">
    <link rel="icon" sizes="96x96"    href="<?php  echo $view->getThemePath()?>/img/favicon96.png">
    <link rel="icon" sizes="120x120"  href="<?php  echo $view->getThemePath()?>/img/favicon120.png">
    <link rel="icon" sizes="128x128"  href="<?php  echo $view->getThemePath()?>/img/favicon128.png">
    <link rel="icon" sizes="152x152"  href="<?php  echo $view->getThemePath()?>/img/favicon152.png">
    <link rel="icon" sizes="180x180"  href="<?php  echo $view->getThemePath()?>/img/favicon180.png">
    <link rel="icon" sizes="192x192"  href="<?php  echo $view->getThemePath()?>/img/favicon192.png">
    <link rel="icon" sizes="228x228"  href="<?php  echo $view->getThemePath()?>/img/favicon228.png">
  </head>
<body class="rougemont <?php echo $c->getCollectionTypeHandle(); if (!$c->getCollectionPath()) echo " accueil"; ?>">
  
<?php


/*
$isMobile = preg_match(
  "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
  , $_SERVER["HTTP_USER_AGENT"]);
$innerWidth = -1;
if (isset($_COOKIE['innerWidth'])) $innerWidth = $_COOKIE['innerWidth'];
define("SMALL", false);
if ($innerWidth > 767);
else if ($isMobile) define("SMALL", true);
echo "<!-- HTTP_USER_AGENT=".$_SERVER["HTTP_USER_AGENT"]." innerWidth=".$innerWidth." SMALL=".SMALL."  -->\n";
*/




?>


<div class="<?php
// this div is needed by c5 to insert its bar
echo $c->getPageWrapperClass();
$parent = trim(dirname($c->getCollectionPath()), " /");
if (preg_match('@[a-z]+@', $parent)) echo ' parent-',$parent;
echo ' ',basename($c->getCollectionPath());

?>">
