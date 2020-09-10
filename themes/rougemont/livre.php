<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main class="container" id="livre_blocs">
  <div class="mt-4 mb-4" id="chapo">
    <?php
       $a = new Area('livre_chapo');
       $a->display($c);
    ?>
  </div>
  <div class="row">
    <div class="col-md-4 pb-4">
      <?php
         $a = new Area('livre_image');
         $a->display($c);
      ?>
    </div>
    <div class="col-md-8">
      <?php
        $a = new Area('livre_notice');
        $a->display($c);
      ?>
      <nav class="foot my-5">
        <?php 
        $prevnext = new GlobalArea('prev_next');
        $prevnext->display($c);
        ?>
      </nav>

    </div>
    <div class="col-md-6 bg-light py-5 order-md-last">
      <nav class="toclocal" id="livre_sommaire">
        <?php
           $a = new Area('livre_sommaire');
           $a->display($c);
        ?>
      </nav>
    </div>
    <div class="col-md-6 bg-light py-5" id="biblio">
      <?php
         $a = new Area('livre_biblio');
         $a->display($c);
      ?>
    </div>
  </div>
</main>

<?php   $this->inc('elements/footer.php'); ?>
