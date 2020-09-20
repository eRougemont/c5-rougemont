<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');

$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();
$gp = Page::getByID($parent->getCollectionParentID());

?>

<header id="header" class="topheader liseuse">
  <?php 
/*
  <nav id="breadcrumb" class="rail">
    <div class="container">
      <div class="rail">
        <a class="home" href="<?php print DIR_REL; ?>"><img height="32" src="<?php  echo $view->getThemePath()?>/img/home.png" alt="Accueil, Rougemont 2.0"
        /></a><b>/</b><a href="<?php print($gp->getCollectionLink()); ?>"><?php
          echo $gp->getCollectionName();
        ?></a><b>/</b><a href="<?php print($parent->getCollectionLink()); ?>"><?php print($booktitle);
        ?></a><b>/</b><a href="#"><?php print($c->getCollectionName()); ?></a>
      </div>
    </div>
  </nav>

 */
//  $this->inc('elements/header_ban.php'); 
?>
  <div id="header_md" class="bg-red">
    <div class="container">
      <a id="menubut" href="#menu" role="button" aria-label="Menu du site, montrer/cacher" class="icon menu">
        <svg viewBox="0 0 24 24">
          <path class="show" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
          <path class="hide" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
        </svg>
      </a>
      <div class="meta">
        <?php
          $parent = Page::getByID($c->getCollectionParentID());
          $booktitle = $parent->getCollectionName();
          echo '<a id="runtitle" href="'.$parent->getCollectionLink().'">'.$booktitle.'</a>';
        ?>
        <a id="runhead"><?php echo $c->getCollectionName(); ?></a>
      </div>
      <?php /*
      <img class="signature" src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
      <button class="icon" name="search" type="button"><svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
      */ ?>
      <a id="northbut" href="#" role="button" class="icon north" title="Sommet de la page">
        <svg viewBox="0 0 24 24">
          <path d="M5,9l1.41,1.41L11,5.83V22H13V5.83l4.59,4.59L19,9l-7-7L5,9z"/>
        </svg>
      </a>
      <a id="tocbut" href="#toc" role="button" aria-label="Sommaire du livre, montrer/cacher" class="icon toc">
        <svg class="toc" viewBox="0 0 24 24">
          <path class="show" d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/>
          <path class="hide" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
        </svg>
      </a>
    </div>
  </div>
  <div id="menu" class="bg-light">
    <div class="container ">
      <form class="search" id="search" autocomplete="off" onsubmit="return false;" action="<?php echo BASE_URL; ?>/data/titles">
        <button name="magnify" type="button"><svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
        <input id="q" name="q" type="text" class="q"/>
        <button name="reset" class="reset" type="reset"><svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></button>
        <div id="results"></div>
      </form>

      <div class="headnav">
      <?php
        $a = new GlobalArea('Header Navigation');
        $a->display();
      ?>
      </div>
    </div>
  </div>

</header>
<main class="liseuse">
   <div id="viewport" class="container">
    <div id="text" class="body">
      
      <?php
        echo '<nav class="booktitle"><a href="'.$parent->getCollectionLink().'">'.$booktitle.'</a></nav>';
        $prevnext = new GlobalArea('prev_next');
        // $prevnext->display($c);
        $a = new Area('Main');
        $a->display($c);
      ?>
      <div id="notebox">
      </div>
      <nav class="foot my-5">
        <?php $prevnext->display($c); ?>
      </nav>
    </div>
    <aside id="sidebar" class="bg-light">
      <?php
/*
      <div class="buts">
        <i class="fa fa-images"></i>
        <i class="fa fa-list-ul"></i>
      </div>
        <div id="pages">
        
        </div>

*/      
      ?>
      <nav class="toclocal" id="toc">
      <?php
        $a = new Area('Sidebar');
        $a->display($c);
        
        
      ?>
        </nav>
      </aside>
  </div>
</main>
<?php   $this->inc('elements/footer.php'); ?>
