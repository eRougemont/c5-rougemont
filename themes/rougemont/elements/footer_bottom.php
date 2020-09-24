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

// le css minify casse les @import, Chrome bloque sur les ; qui ne sont pas échappés.
// @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital@0%3B1&family=Fira+Sans:ital,wght@0,300%3B0,400%3B0,500%3B1,300%3B1,400%3B1,500&display=swap');

/* ?? est-ce bien ça qu'il faut ?
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166319083-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-166319083-1');
    </script>

 */
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
