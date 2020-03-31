<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>

<div class="bkg-gradient-white-to-brighter pad-top-xl pad-bottom-xl" id="bib_chapo">
  <div class="container">
    <?php
    $a = new Area('Page Header');
    $a->enableGridContainer();
    $a->display($c);
    ?>
  </div>
</div>

<div id="bib_pix" class=" pad-top-xl pad-bottom-xl">
  <div class="container">
    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    $a->display($c);
    ?>
  </div>
</div>

  <div class="container">
    <?php
    $a = new Area('Page Footer');
    $a->enableGridContainer();
    $a->display($c);
    ?>
  </div>
</main>

<?php   $this->inc('elements/footer.php'); ?>
