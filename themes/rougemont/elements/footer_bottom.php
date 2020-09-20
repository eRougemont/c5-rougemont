<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

    </div>
    <?php 
    /*
     * pour un kit de chargement font awesome, attention C5 a besoin d’une V4
     * <script src="https://kit.fontawesome.com/0f33b966cc.js" crossorigin="anonymous" async></script>
     *
     * Exécuter les scripts rougemont.js après C5 et notamment la barre d’outils.
     *
     */
$html = Loader::helper('html');
$this->addFooterItem($html->javascript($view->getThemePath().'/js/rougemont.js'));
Loader::element('footer_required');
?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166319083-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-166319083-1');
    </script>
  </body>
</html>
