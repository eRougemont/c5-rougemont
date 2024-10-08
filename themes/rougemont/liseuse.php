<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();

?>

<header id="header" class="top liseuse" role="banner">
  <div id="header_md" class="bg-red">
    <div class="container">
      <a id="menubut" href="#menu" role="button" aria-label="Menu du site, montrer/cacher" class="icon menu">
        <svg viewBox="0 0 24 24" width="24px" height="24px">
          <path class="show" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
          <path aria-label="menu_open" class="hide" d="M3,18h13v-2H3V18z M3,13h10v-2H3V13z M3,6v2h13V6H3z M21,15.59L17.42,12L21,8.41L19.59,7l-5,5l5,5L21,15.59z"/>
        </svg>
      </a>
      <a href="<?php echo BASE_URL; ?>" title="Accueil, Rougemont 2.0" id="signature">
        <img height="40" class="signature" src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
      </a>
      <div class="meta">
        <?php
          echo '<a id="runtitle" href="'.$parent->getCollectionLink().'">'.$booktitle.'</a>';
        ?>
        <a id="runhead" href="#"><?php echo $c->getCollectionName(); ?></a>
      </div>
      <a id="northbut" href="#" role="button" class="icon north" title="Sommet de la page">
        <svg viewBox="0 0 24 24" width="24px" height="24px">
          <path d="M5,9l1.41,1.41L11,5.83V22H13V5.83l4.59,4.59L19,9l-7-7L5,9z"/>
        </svg>
      </a>
      <a id="tocbut" href="#toc" role="button" aria-label="Sommaire du livre, montrer/cacher" class="icon toc">
        <svg class="toc" viewBox="0 0 24 24" width="24px" height="24px">
          <path class="show" aria-label="explore" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5.5-2.5l7.51-3.49L17.5 6.5 9.99 9.99 6.5 17.5zm5.5-6.6c.61 0 1.1.49 1.1 1.1s-.49 1.1-1.1 1.1-1.1-.49-1.1-1.1.49-1.1 1.1-1.1z"/>
          <path class="hide" aria-label="explore_off" d="M12 4c4.41 0 8 3.59 8 8 0 1.48-.41 2.86-1.12 4.06l1.46 1.46C21.39 15.93 22 14.04 22 12c0-5.52-4.48-10-10-10-2.04 0-3.93.61-5.51 1.66l1.46 1.46C9.14 4.41 10.52 4 12 4zm2.91 8.08L17.5 6.5l-5.58 2.59 2.99 2.99zM2.1 4.93l1.56 1.56C2.61 8.07 2 9.96 2 12c0 5.52 4.48 10 10 10 2.04 0 3.93-.61 5.51-1.66l1.56 1.56 1.41-1.41L3.51 3.51 2.1 4.93zm3.02 3.01l3.98 3.98-2.6 5.58 5.58-2.59 3.98 3.98c-1.2.7-2.58 1.11-4.06 1.11-4.41 0-8-3.59-8-8 0-1.48.41-2.86 1.12-4.06z"/>
        </svg>
      </a>
    </div>
  </div>
  <div id="menu" class="liseuse">
    <div class="container ">
      <label for="titles">Site, trouver un titre</label>
      <form class="search" id="search" autocomplete="off" onsubmit="return false;" action="<?php echo BASE_URL; ?>/data/titles" role="search">
        <button name="magnify" type="button">
          <svg viewBox="0 0 24 24"  width="24px" height="24px">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
        </button>
        <input id="titles" name="titles" aria-describedby="titles-hint" type="text" class="q" placeholder="am… dia… eu… fed…"/>
        <button name="reset" class="reset" type="reset">
          <svg viewBox="0 0 24 24"  width="24px" height="24px">
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
          </svg>
        </button>
        <div class="progress"><div></div></div>
        <div id="results"></div>
      </form>
      <?php $this->inc('elements/menubar.php'); ?>
    </div>
  </div>
</header>
<?php 
/* // pour mémoire

  <nav id="breadcrumb" class="rail">
    <div class="container">
      <div class="rail">
        <a class="home" href="<?php print DIR_REL; ?>"><img height="32" src="<?php  echo $view->getThemePath()?>/img/home.png" alt="Accueil, Rougemont 2.0"
        /></a><b>/</b><b>/</b><a href="<?php print($parent->getCollectionLink()); ?>"><?php print($booktitle);
        ?></a><b>/</b><a href="#"><?php print($c->getCollectionName()); ?></a>
      </div>
    </div>
  </nav>

      <a title="Accueil, Rougemont 2.0" class="ddr" href="<?php print DIR_REL; ?>"><img height="48" width="48" src="<?php  echo $view->getThemePath()?>/img/ddr_icon.png"/></a>
          <path aria-label="expand" class="hide" d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"/>
      <button class="icon" name="search" type="button"><svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
          <path aria-label="close" class="hide" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>


 */
?>


<main class="liseuse">
   <div id="viewport" class="container">
    <div id="text" class="body">
      
      <?php
        echo '<nav class="booktitle"><a href="'.$parent->getCollectionLink().'">'.$booktitle.'</a></nav>';
        echo '<div id="keywords" class="text2"></div>';
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
        <div class="container">
      <?php
        $gp = Page::getByID($parent->getCollectionParentID());
        $class = basename(trim($gp->getCollectionLink(), '/'));
        echo'
<header>
  <div>
    <a title="Collection de ce titre" class="collection '.$class.'" href="'.$gp->getCollectionLink().'">'.$gp->getCollectionName().'</a>
    <a class="icon" style="margin-right: 8px;" rel="home" href="'.DIR_REL.'" title="Accueil, Rougemont 2.0">
      <svg viewBox="0 0 24 24" width="24px" height="24px">
        <path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/>
      </svg>
    </a>
  </div>
  <div>
    <a title="Couverture de ce titre" class="title" href="'.$parent->getCollectionLink().'">'.$parent->getCollectionName().'</a>
  </div>
</header>
';
        $a = new Area('Sidebar');
        $a->display($c);
      ?>
        </div>
      </nav>
    </aside>
    <aside id="seealso" class="bg-light">
      <header>
        <div class="head">Sur le même sujet (rapprochements automatiques)</div>
      </header>
      <nav id="seelinks">

      </nav>
    </aside>
  </div>
</main>
<?php 

$here = $c->getCollectionLink();
$id = null;
if (preg_match('@/livres/@', $here) || preg_match('@/inedits/ddr19630100cofr/@', $here)) {
    preg_match('@/([^/]+)/(\d+)$@', $here, $matches);
    $id = $matches[1] . '_' . str_pad($matches[2], 3, '0', STR_PAD_LEFT);
}
// articles ou inedits
else {
  preg_match('@/([^/]+)$@', $here, $matches);
  $id = $matches[1];
}
$url = 'https://oeuvres.unige.ch/ddrlab/data/jsondoc.jsp?callback=seealso&amp;id=' . $id;

echo '<script defer src="' . $url . '"></script>';
    
?>
<?php   $this->inc('elements/footer.php'); ?>
