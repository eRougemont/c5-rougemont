<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer id="footer">
  <div class="bkg-color-darker pad-top-xxl pad-bottom-xxl" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div>
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="signature Denis de Rougemont blanc" class="signature">
            <span>
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </span>
          </div>
        </div>
        <div class="col-3">
          <p>Un site hébergé par :</p>
          <img src="<?php  echo $view->getThemePath()?>/img/gsi.png" class="unige" alt="Unige Global Studies Institute (logo)">
        </div>
        <div class="col-3">
          <h5>Contact</h5>
          <p>
            Rougemont 2.0
            <br/>GSI de l’Université de Genève Sciences II,
            Quai Ernest-Ansermet 30
            <br/>Case postale CH - 1211 Genève 4
            <br/><a href="mailto:rougemont@unige.ch">rougemont@unige.ch</a>
          </p>
        </div>
        <div class="col-3">
          <h5>Conditions d'usage</h5>
          <p>
            Sauf indication contraire, les contenus de ce site sont publiés sous une licence Creative commons CC-BY-NC, 4.0.
          </p>
          <div id="loginout"><?php  echo Core::make('helper/navigation')->getLogInOutLink()?></div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="<?php  echo $view->getThemePath()?>/js/rougemont.js">//</script>
<script>Teinte.init()</script>
<?php  $this->inc('elements/footer_bottom.php');?>
