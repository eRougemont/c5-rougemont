<?php  
defined('C5_EXECUTE') or die("Access Denied."); 

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="<?php  echo $view->getThemePath()?>/img/favicon.png"/>
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,500&family=EB+Garamond:ital@0;1&display=swap">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="all" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
>>>>>>> 5d93dafbd04c707b26b97edd62f5ca727468e3fc
<?php  
$html = Loader::helper('html');
$this->addHeaderItem($html->css('css/bootstrap-grid.css'));
$this->addHeaderItem($html->css('css/teinte.css'));
$this->addHeaderItem($html->css('css/rougemont.css'));
Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : ''));

/*
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,500&family=EB+Garamond:ital@0;1&display=swap"/>
    C5 a besoin de jquery en mode admin (v. 1.12.2 avec ckedditor) et des plugins comme les diaporamas
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/teinte.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $view->getThemePath()?>/css/rougemont.css" />
    <script>
// inform server of client width
document.cookie = "innerWidth="+window.innerWidth+";samesite=strict";
    </script>
<<<<<<< HEAD
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="all" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
*/
    ?>
=======
    <?php /* C5 a besoin que jquery soit chargé (v. 1.12.2 avec ckedditor)  */?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

>>>>>>> 5d93dafbd04c707b26b97edd62f5ca727468e3fc
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
