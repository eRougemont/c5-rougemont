<?php  defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
?>

<header id="header">
    <div id="header_ban">
    <picture>
      <source srcset="<?php  echo $view->getThemePath()?>/img/ban-header.webp" type="image/webp">
      <img src="<?php  echo $view->getThemePath()?>/img/ban-header.png" alt="Denis de Rougemont, l’œuvre complète en ligne"/>
    </picture>
    <div class="container" id="header_container">
      <div id="header_row">
        <div id="portrait">
          <a href="<?php echo BASE_URL; ?>">
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
            <span id="moto"  class="d-none d-md-block">
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </span>
          </a>
        </div>
        <div id="search_nav">
          <div class="search">
            <?php
            $a = new GlobalArea('Header Search');
            $a->display();
            ?>
          </div>
          <div class="headnav pb-2">
            <?php
            $a = new GlobalArea('Header Navigation');
            $a->display();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
