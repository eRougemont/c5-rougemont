<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
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
            <br/>l’intégrale
            <br/>en accès libre
          </div>
        </div>
        <div id="search_nav">
          <form class="search mt-md-3 mb-md-4" id="search" autocomplete="off" onsubmit="return false;" action="<?php echo BASE_URL; ?>/data/titles">
            <input id="titles" name="titles" type="text" class="q"/>
            <button name="reset" class="reset" type="reset"><svg viewBox="0 0 24 24" width="24px" height="24px"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></button>
            <button name="magnify" type="button"><svg viewBox="0 0 24 24" width="24px" height="24px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
            <div class="progress"><div></div></div>
            <div id="results"></div>
          </form>
          <div class="headnav">
            <?php $this->inc('elements/header_nav.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

