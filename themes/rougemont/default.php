<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>

  <div class="container">
    <?php
    $a = new Area('Page Header');
    $a->enableGridContainer();
    $a->display($c);
    ?>

    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    $a->display($c);
    ?>

    <?php
    $a = new Area('Page Footer');
    $a->enableGridContainer();
    $a->display($c);
    ?>
  </div>
</main>

<?php   $this->inc('elements/footer.php'); ?>
