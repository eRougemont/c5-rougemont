<?php  defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
?>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-3 logo">
        <div id="portrait">
          <a href="<?php echo BASE_URL; ?>">
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
            <span id="moto">
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </span>
          </a>
        </div>
      </div>
      <div class="col-9">
        <div class="search">
          <?php
            $a = new GlobalArea('Header Search');
            $a->display();
          ?>
        </div>
        <div class="headnav">
            <?php
              $a = new GlobalArea('Header Navigation');
              $a->display();
            ?>
        </div>
      </div>
    </div>
  </div>
</header>
