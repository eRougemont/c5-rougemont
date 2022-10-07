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
    <!-- Google Analytics -->
    <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', 'UA-166319083-1', 'auto');
    ga('send', 'pageview');
    </script>
    <script defer src='https://www.google-analytics.com/analytics.js'></script>
    <!-- End Google Analytics -->
  </body>
</html>
