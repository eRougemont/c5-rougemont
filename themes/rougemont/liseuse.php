<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');

$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();
?>

<header id="header" class="shrinkable">
  <div class="container">
    <div class="row align-items-center">
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
    <div class="row">
      <div class="col-4"> </div>
      <div class="col-8">
        <a href="."><h1 class="custom-1"><?php print($booktitle); ?></h1></a>
      </div>
    </div>
    <div id="viewport" class="row">
      <aside class="bkg-color-brightest col-4" id="sidebar">
        <div class="toclocal" id="toc">
          <?php
            $a = new Area('Sidebar');
            $a->display($c);
          ?>
        </div>
      </aside>
      <div class="col-8" id="text">
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
<?php   $this->inc('elements/footer_liseuse.php'); ?>