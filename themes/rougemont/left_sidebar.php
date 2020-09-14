<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main class="container">
  <?php
  $a = new Area('Page Header');
  $a->enableGridContainer();
  $a->display($c);
  ?>
  <div class="row">
    <div class="col-md-8 col-sm-offset-1 col-content pb-5">
        <?php
        $a = new Area('Main');
        $a->setAreaGridMaximumColumns(12);
        $a->display($c);
        ?>
    </div>
    <aside id="sidebar" class="col-md-3 col-sidebar py-5 order-md-first bg-light">
        <?php
        $a = new GlobalArea('Sidebar');
        $a->display($c);
        ?>
    </aside>
  </div>

  <?php
  $a = new Area('Page Footer');
  $a->enableGridContainer();
  $a->display($c);
  ?>

</main>

<?php   $this->inc('elements/footer.php'); ?>
