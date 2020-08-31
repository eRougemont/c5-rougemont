<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');

$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();
?>

<header id="header" class="shrinkable">
  <div class="container">
    <div class="row">
      <div class="col-3 logo">
        <div id="portrait">
          <a href="<?php echo BASE_URL; ?>">
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
            <span id="moto">
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </span>
          </a>
        </div>
      </div>
      <div class="col-9">
        <div id="sitebox">
          <div class="search">
            <?php
            $a = new GlobalArea('Header Search');
            $a->display();
            ?>
          </div>
          <div class="headnav">
            <?php
            $a = new GlobalArea('Header Navigation');
            $a->display();
            ?>
          </div>
        </div>
        <div id="breadcrumb">
          <div class="gotop">
            <a href="#">
              <i class="fas fa-arrow-up"></i>
            </a>
          </div>
          <div class="headmeta">
            <a href="../"><?php
              $gp = Page::getByID($parent->getCollectionParentID());
              echo $gp->getCollectionName();
            ?></a>
            &gt; <a href="."><?php print($booktitle); ?></a>
            &gt;  <a href="#"><?php print($c->getCollectionName()); ?></a>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>


<main class="liseuse">
  <div class="container" id="container">
     <div id="viewport">
      <aside id="sidebar" class="col-sidebar">
        <div class="bg-light" id="sidefix">
          <div class="buts">
            <i class="far fa-images"></i>
            <i class="fas fa-list-ul"></i>
          </div>
          <div class="toclocal" id="toc">
            <?php
              $a = new Area('Sidebar');
              $a->display($c);
            ?>
          </div>
          <div id="pages">
          
          </div>
        </div>
      </aside>
      <div id="text">
        <a href="."><h1 class="custom-1"><?php print($booktitle); ?></h1></a>
        <?php
          $prevnext = new GlobalArea('prev_next');
          $prevnext->display($c);
          $a = new Area('Main');
          $a->display($c);
          $prevnext->display($c);
        ?>
      </div>
    </div>
  </div>
</main>
<?php   $this->inc('elements/footer.php'); ?>
