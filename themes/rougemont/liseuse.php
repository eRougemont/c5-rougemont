<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');

$prevnext = new GlobalArea('prev_next');
$parent = Page::getByID($c->getCollectionParentID());
$booktitle = $parent->getCollectionName();
?>

<header id="header" class="shrinkable">
    <div class="container">
        <div class="row">
            <div class="col-3 logo">
							<div id="portrait">
								<a href="">
									<img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
									<span>
										L'intégrale de
										<br/>Denis de Rougemont<br/>
										en libre accès
									</span>

								</a>
							</div>
            </div>
            <div class="col-9">
								<div class="row">
									<div class="col-12 flex flex-right search-form-container">
                    <?php
                    $a = new GlobalArea('Header Search');
                    $a->display();
                    ?>
									</div>
									<div class="col-12 headnav">
                <?php
                $a = new GlobalArea('Header Navigation');
                $a->display();
                ?>
									</div>
                  <div class="col-11 livre-titre-et-chapitre">
                    <h1><a href="../"><?php print($booktitle); ?></a></h1>
                    <h2><?php print($c->getCollectionName()); ?></h2>
                    <div class="prevnext">
                      <?php $prevnext->display($c); ?>
                    </div>
                  </div>
                  <div class="col-1 go-to-top-of-page">
                    <a href="#">
                      <i class="fas fa-arrow-up"></i>
                      Début
                    </a>
                  </div>

								</div>

							</div>
        </div>
    </div>
</header>


<main>
  <div class="container">
    <div class="row">
      <div class="col-3 bkg-color-brightest auto-scroll pad-top-l pad-bottom-l">
        <?php
           $a = new Area('liseuse_sommaire');
           $a->display($c);
        ?>
      </div>
      <div class="col-9">
        <h1 class="custom-1"><?php print($booktitle); ?></h1>
        <?php
           $prevnext->display($c);
           $a = new Area('liseuse_texte');
           $a->display($c);
        ?>
      </div>
    </div>
  </div>
</main>
<?php   $this->inc('elements/footer_liseuse.php'); ?>
