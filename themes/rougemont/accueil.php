<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
$basename = basename($c->getCollectionPath());
?>
<header id="header" class="top accueil">
  <div id="header_ban">
    <picture>
      <source srcset="<?php  echo $view->getThemePath()?>/img/header_ban.webp" type="image/webp">
      <img src="<?php  echo $view->getThemePath()?>/img/header_ban.png" alt="Denis de Rougemont, l’œuvre complète en ligne"/>
    </picture>
    <div class="container" id="header_container">
      <div id="header_row">
        <div id="portrait">
          <a href="<?php echo BASE_URL; ?>">
            <img class="signature" src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
          </a>
          <div id="moto">
            Denis de Rougemont,
            <br/>l’intégrale en ligne
          </div>
        </div>
        <div id="menu">
          <form class="search mt-md-3 mb-md-4" id="search" autocomplete="off" onsubmit="return false;" action="<?php echo BASE_URL; ?>/data/titles">
            <input id="titles" name="titles" type="text" class="q"/>
            <button name="reset" class="reset" type="reset"><svg viewBox="0 0 24 24" width="24px" height="24px"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></button>
            <button name="magnify" type="button"><svg viewBox="0 0 24 24" width="24px" height="24px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
            <div class="progress"><div></div></div>
            <div id="results"></div>
          </form>
          <?php $this->inc('elements/menubar.php'); ?>
        </div>
      </div>
    </div>
  </div>
</header>


<main id="accueil" class="accueil">

  <div id="accueil_row1">
    <div class="container">
      <div class="row ui">
        <div id="accueil_actus" class="col-md-7">
          <h1><a href="actualites">Actualités</a></h1>
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
  </div>

  <div class="bkg-gradient-brighter-to-white py-4 py-md-5 ui" id="accueil_livres">
    <?php $this->inc('elements/couvs.php'); ?>
    <div class="center pt-3 pt-md-5">
      <a href="livres" class="btn btn-plain btn-plain-red btn-small m-2">Tous les livres</a>
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
          <div class="center">
            <a href="articles" class="btn btn-outline btn-outline-red btn-small">Tous les articles</a>
          </div>
        </div>
        <div class="col-md-4 extracts-list-box extracts-list-box-correspondances" id="accueil_correspondances">
          <h1 class="center m-4"><a href="correspondances">Correspondances</a></h1>
          <?php
            $a = new Area('accueil_correspondances');
            $a->display($c);
          ?>
          <div class="center">
            <a href="correspondances" class="btn btn-outline btn-outline-red btn-small">Toutes les correspondances</a>
          </div>
        </div>
        <div class="col-md-4 extracts-list-box extracts-list-box-archives" id="accueil_archives">
          <h1 class="center m-4">Archives</h1>
          <?php
            $a = new Area('accueil_archives');
            $a->display($c);
          ?>
        <!--
          <a href="archives" class="btn btn-outline btn-outline-red btn-small">Toutes les archives</a>
          -->
        </div>
      </div>
    </div>
  </div>

  <div class="bg-red pt-4 pb-4" id="accueil_medias">
    <div class="container">
      <h1 class="center"><a href="medias">Médias</a></h1>
      <div class="row my-3">
        <div class="pres col-md-5">
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
      <div class="center">
        <a href="medias" class="btn btn-outline-light btn-small">Tous les médias</a>
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
<?php   $this->inc('elements/footer_accueil.php'); ?>
