<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

    </div>
    <?php 
<<<<<<< HEAD
/*
 * pour un kit de chargement font awesome, attention C5 a besoin d’une V4
 * <script src="https://kit.fontawesome.com/0f33b966cc.js" crossorigin="anonymous" async></script>
 *
 * Exécuter les scripts rougemont.js après C5 et notamment la barre d’outils.
 *
 * S’il faut un jquery, celui de C5, sinon cf. page_theme.php
 * <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 *
 * <script src="<?php  echo $view->getThemePath()?>/js/rougemont.js">//</script>
 */
$html = Loader::helper('html');
$this->addFooterItem($html->javascript($view->getThemePath().'/js/rougemont.js'));
Loader::element('footer_required');
?>
    <script>Teinte.init()</script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166319083-1"></script>
=======
    /*
     * pour un kit de chargement font awesome, attention C5 a besoin d’une V4
     * <script src="https://kit.fontawesome.com/0f33b966cc.js" crossorigin="anonymous" async></script>
     *
     * Exécuter les scripts rougemont.js après C5 et notamment la barre d’outils.
     */?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <?php  Loader::element('footer_required'); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166319083-1"></script>
    <script src="<?php  echo $view->getThemePath()?>/js/rougemont.js">//</script>
    <script>Teinte.init()</script>
>>>>>>> 5d93dafbd04c707b26b97edd62f5ca727468e3fc
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-166319083-1');
    </script>
<<<<<<< HEAD
    <style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,500&family=EB+Garamond:ital@0;1&display=optional');
    </style>
=======
>>>>>>> 5d93dafbd04c707b26b97edd62f5ca727468e3fc
  </body>
</html>
