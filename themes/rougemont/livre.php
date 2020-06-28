<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main>
  <div>
    <div class="container">
      <div class="marg-top-xl marg-bottom-xl" id="chapo">
        <?php
           $a = new Area('livre_chapo');
           $a->display($c);
        ?>
      </div>
      <div class="row">



        <div class="col-4 pb-4">
          <?php
             $a = new Area('livre_image');
             $a->display($c);
          ?>
        </div>

        <div class="col-8">
          <?php
            $a = new Area('livre_notice');
            $a->display($c);

            $prevnext = new GlobalArea('prev_next');
            $prevnext->display($c);
          ?>
        </div>

      </div>
    </div>

    <div class="bkg-color-brightest pad-top-xl pad-bottom-xl">
      <div class="container">
        <div class="row">
          <div class="col-6" id="biblio">
            <?php
               $a = new Area('livre_biblio');
               $a->display($c);
            ?>
          </div>
          <div class="col-6">
            <nav class="toclocal" id="toc">
              <?php
                 $a = new Area('livre_sommaire');
                 $a->display($c);
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php   $this->inc('elements/footer.php'); ?>
