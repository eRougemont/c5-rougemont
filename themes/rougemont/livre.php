<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main class="container" id="livre_blocs">
  <div class="row">
    <div class="mt-4 mb-4 col-md-12" id="chapo">
      <?php
         $a = new Area('livre_chapo');
         $a->display($c);
      ?>
    </div>
    <div class="col col-md-4 pb-md-4" id="cover">
      <?php
        $a = new Area('livre_image');
        $a->display($c);
      ?>
    </div>
    <div class="col col-md-8">
      <?php
        $a = new Area('livre_notice');
        $a->setBlockWrapperStart("\n\n<div class=\"c5block\">");
        $a->setBlockWrapperEnd("</div>\n\n");
        $a->display($c);
      ?>
    </div>
    <nav class="toc_details col col-md-6 bg-light py-md-5 order-md-last" id="livre_sommaire">
      <?php
        $a = new Area('livre_sommaire');
        $a->setBlockWrapperStart("\n\n<div class=\"c5block\">");
        $a->setBlockWrapperEnd("</div>\n\n");
        $a->display($c);
      ?>
    </nav>
    <div class="col col-md-6 bg-light py-md-5" id="biblio">
      <?php
        $a = new Area('livre_biblio');
        $a->setBlockWrapperStart("\n\n<div class=\"c5block\">");
        $a->setBlockWrapperEnd("</div>\n\n");
        $a->display($c);
      ?>
    </div>
  </div>
  <nav class="my-md-5">
    <?php 
    $prevnext = new GlobalArea('prev_next');
    $prevnext->display($c);
    ?>
  </nav>
</main>

<?php   $this->inc('elements/footer.php'); ?>
