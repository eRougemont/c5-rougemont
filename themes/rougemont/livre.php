<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main>
  <div class="container" id="livre_blocs">
    <div class="mt-4 mb-4" id="chapo">
      <?php
         $a = new Area('livre_chapo');
         $a->display($c);
      ?>
    </div>
    <div class="row">
      <div class="col col-4 pb-4">
        <?php
           $a = new Area('livre_image');
           $a->display($c);
        ?>
      </div>
      <div class="col col-8">
        <?php
          $a = new Area('livre_notice');
          $a->display($c);

          $prevnext = new GlobalArea('prev_next');
          $prevnext->display($c);
        ?>
      </div>
    </div>
    <div class="row bg-light pt-5 pb-5">
      <div class="col col-6" id="biblio">
        <?php
           $a = new Area('livre_biblio');
           $a->display($c);
        ?>
      </div>
      <div class="col col-6">
        <nav class="toclocal" id="livre_sommaire">
          <?php
             $a = new Area('livre_sommaire');
             $a->display($c);
          ?>
        </nav>
      </div>
    </div>
  </div>

</main>

<?php   $this->inc('elements/footer.php'); ?>
