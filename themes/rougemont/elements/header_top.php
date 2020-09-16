<?php  
defined('C5_EXECUTE') or die("Access Denied."); 

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="<?php  echo $view->getThemePath()?>/img/favicon.png"/>
<?php  
$html = Loader::helper('html');
$this->addHeaderItem($html->css('css/bootstrap-grid.css'));
$this->addHeaderItem($html->css('css/teinte.css'));
$this->addHeaderItem($html->css('css/rougemont.css'));
Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : ''));

/*
    C5 a besoin de jquery en mode admin (v. 1.12.2 avec ckedditor) et des plugins comme les diaporamas, il est demandé dans le body pour ne pas trop arrêter la page
    mais defer ou async ne marchent pas.
    Les fontes sont demandée en pied de page.
    <script>
// inform server of client width
document.cookie = "innerWidth="+window.innerWidth+";samesite=strict";
    </script>
*/
    ?>
  </head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<?php
$isMobile = preg_match(
  "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
  , $_SERVER["HTTP_USER_AGENT"]);
$innerWidth = -1;
if (isset($_COOKIE['innerWidth'])) $innerWidth = $_COOKIE['innerWidth'];
define("SMALL", false);
if ($innerWidth > 767);
else if ($isMobile) define("SMALL", true);
echo "<!-- HTTP_USER_AGENT=".$_SERVER["HTTP_USER_AGENT"]." innerWidth=".$innerWidth." SMALL=".SMALL."  -->\n";
?>
<div id="" class="<?php
echo $c->getPageWrapperClass();
$parent = trim(dirname($c->getCollectionPath()), " /");
if (preg_match('@[a-z]+@', $parent)) echo ' parent-',$parent;
echo ' ',basename($c->getCollectionPath());

?>">
