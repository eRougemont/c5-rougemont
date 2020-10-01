<?php  defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
?>

<header id="header" class="top other" role="banner">
  <div id="header_mobile" class="bg-red">
    <div class="container">
      <a id="menubut" href="#menu" role="button" aria-label="Menu du site, montrer/cacher" class="icon menu">
        <svg viewBox="0 0 24 24" width="24px" height="24px">
          <path class="show" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
          <path aria-label="menu_open" class="hide" d="M3,18h13v-2H3V18z M3,13h10v-2H3V13z M3,6v2h13V6H3z M21,15.59L17.42,12L21,8.41L19.59,7l-5,5l5,5L21,15.59z"/>
        </svg>
      </a>
      <a href="<?php echo BASE_URL; ?>">
        <img class="signature" src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
      </a>
    </div>
  </div>
  <div id="header_ban">
    <picture>
      <source srcset="<?php  echo $view->getThemePath()?>/img/header_ban.webp" type="image/webp">
      <img src="<?php  echo $view->getThemePath()?>/img/header_ban.png" alt="Denis de Rougemont, l’œuvre complète en ligne"/>
    </picture>
    <div class="container">
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
        <div id="menu" class="other">
          <form role="search" class="search mt-md-3 mb-md-4" id="search" autocomplete="off" onsubmit="return false;" action="<?php echo BASE_URL; ?>/data/titles">
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

