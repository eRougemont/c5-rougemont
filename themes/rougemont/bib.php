<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>

<div class="bkg-gradient-white-to-brighter pt-4 pb-4 clearfix" id="bib_chapo">
  <div class="container">
    <?php
    $a = new Area('Page Header');
    $a->display($c);
    ?>
  </div>
</div>

<div id="bib_covers" class=" pt-4 pb-4">
  <div class="container clearfix">
    <?php
    $a = new Area('Main');
    $a->display($c);
    ?>
  </div>
</div>

  <div class="container">
    <?php
    $a = new Area('Page Footer');
    $a->display($c);
    ?>
  </div>
</main>

<?php   $this->inc('elements/footer.php'); ?>
