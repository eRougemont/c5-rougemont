<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main id="accueil">

  <div class="container">
    <div class="row">
      <div id="accueil_actus" class="col-md-7">
        <h1>Actualités</h1>
        <?php
          $a = new Area('Main');
          $a->enableGridContainer();
          $a->display($c);
        ?>
      </div>
      <div id="accueil_video" class="col-md-5">
        <?php
          $a = new Area('accueil_video');
          $a->enableGridContainer();
          $a->display($c);
        ?>
      </div>
    </div>
  </div>


  <div class="bkg-gradient-brighter-to-white pt-5" id="accueil_livres">
    <div class="container ">
      <div>
        <?php
          $a = new Area('accueil_slider');
          $a->display($c);
        ?>
      </div>
      <div class="center  pt-5 pb-5">
        <a href="livres" class="btn btn-plain btn-plain-red btn-small m-2">Tous les livres</a>
      </div>
    </div>
  </div>

  <div class="bg-light" id="accueil_textes">
    <div class="container bg-white">
      <div class="row">
        <div class="col-md-4   extracts-list-box extracts-list-box-articles" id="accueil_articles">
          <h1 class="center m-4"><a href="articles">Articles</a></h1>
          <?php
            $a = new Area('accueil_articles');
            $a->display($c);
          ?>
        </div>
        <div class="col-md-4 extracts-list-box extracts-list-box-correspondances" id="accueil_correspondances">
          <h1 class="center m-4"><a href="correspondances">Correspondances</a></h1>
          <?php
            $a = new Area('accueil_correspondances');
            $a->display($c);
          ?>
        </div>
        <div class="col-md-4 extracts-list-box extracts-list-box-archives" id="accueil_archives">
          <h1 class="center m-4">Archives</h1>
          <?php
            $a = new Area('accueil_archives');
            $a->display($c);
          ?>
        </div>
      </div>
      <div class="row center pt-3 pb-5" id="accueil_tous">
        <div class="col-md-4">
          <a href="articles" class="btn btn-outline btn-outline-red btn-small">Tous les articles</a>
        </div>
        <div class="col-md-4">
          <a href="correspondances" class="btn btn-outline btn-outline-red btn-small">Toutes les correspondances</a>
        </div>
        <div class="col-md-4">
        <!--
          <a href="archives" class="btn btn-outline btn-outline-red btn-small">Toutes les archives</a>
          -->
        </div>
      </div>
    </div>
  </div>

  <div class="bg-red" id="accueil_medias">
    <div class="container">
      <h1 class="center pt-4 pb-4"><a href="medias">Médias</a></h1>
      <div class="row">
        <div class="trailer col-md-5">
          <?php
            $a = new Area('accueil_trailer');
            $a->display($c);
          ?>
        </div>
        <div class="videos col-md-7">
          <?php
            $a = new Area('accueil_medias');
            $a->enableGridContainer();
            $a->display($c);
          ?>
        </div>
      </div>
    </div>
  </div>

  <div id="accueil_autres">
    <div class="container">
      <?php
        $a = new Area('Page Footer');
        $a->enableGridContainer();
        $a->display($c);
      ?>
    </div>
  </div>

</main>
<script src="<?php  echo $view->getThemePath()?>/js/rougemont.js">//</script>
<script>Teinte.init()</script>


<?php   $this->inc('elements/footer_accueil.php'); ?>
