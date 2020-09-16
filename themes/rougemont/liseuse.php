<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');

$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();
$gp = Page::getByID($parent->getCollectionParentID());

?>

<header id="header" class="topheader">
  <nav id="breadcrumb" class="rail">
    <div class="container">
      <a href="#" class="gotop buticon" title="Sommet de la page">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><rect fill="none" height="24" width="24"/><path d="M5,9l1.41,1.41L11,5.83V22H13V5.83l4.59,4.59L19,9l-7-7L5,9z"/></svg>
      </a>
      <div class="rail">
        <a class="home" href="<?php print DIR_REL; ?>"><img height="32" src="<?php  echo $view->getThemePath()?>/img/home.png" alt="Accueil, Rougemont 2.0"
        /></a><b>/</b><a href="<?php print($gp->getCollectionLink()); ?>"><?php
          echo $gp->getCollectionName();
        ?></a><b>/</b><a href="<?php print($parent->getCollectionLink()); ?>"><?php print($booktitle);
        ?></a><b>/</b><a href="#"><?php print($c->getCollectionName()); ?></a>
      </div>
    </div>
  </nav>
  <div id="header_ban">
    <picture>
      <source srcset="<?php  echo $view->getThemePath()?>/img/ban-header.webp" type="image/webp">
      <img src="<?php  echo $view->getThemePath()?>/img/ban-header.png" alt="Denis de Rougemont, l’œuvre complète en ligne"/>
    </picture>
    <div class="container" id="header_container">
      <div id="header_row">
        <div id="portrait">
          <a href="<?php echo BASE_URL; ?>">
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
            <span id="moto"  class="d-none d-md-block">
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </span>
          </a>
        </div>
        <div id="search_nav">
          <div class="search">
            <?php
            $a = new GlobalArea('Header Search');
            $a->display();
            ?>
          </div>
          <nav class="headnav pb-2">
            <?php
            $a = new GlobalArea('Header Navigation');
            $a->display();
            ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
<main class="liseuse container">
   <div id="viewport">
    <div id="text" class="body">
      
      <?php
        echo '<nav class="booktitle"><a href="'.$parent->getCollectionLink().'">'.$booktitle.'</a></nav>';
        $prevnext = new GlobalArea('prev_next');
        // $prevnext->display($c);
        $a = new Area('Main');
        $a->display($c);
      ?>
      <nav class="foot my-5">
        <?php $prevnext->display($c); ?>
      </nav>
    </div>
      <?php 
      if(defined('SMALL') && SMALL);
      else {
      echo '
      <aside id="sidebar" class="bg-light">
        <div class="buts">
          <i class="fa fa-images"></i>
          <i class="fa fa-list-ul"></i>
        </div>
        <nav class="toclocal" id="toc">
       ';
              $a = new Area('Sidebar');
              $a->display($c);
      echo '
        </nav>
        <div id="pages">
        
        </div>
      </aside>
      ';
     } ?>
  </div>
</main>
<?php   $this->inc('elements/footer.php'); ?>
