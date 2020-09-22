<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer id="footer">
  <div class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 py-3 py-md-5">
          <div class="center">
            <img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="signature Denis de Rougemont blanc" class="signature">
            <p>
              L'intégrale de
              <br/>Denis de Rougemont<br/>
              en libre accès
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3 py-md-5">
          <p>Un site hébergé par :</p>
          <img src="<?php  echo $view->getThemePath()?>/img/gsi.png" class="unige" alt="Unige Global Studies Institute (logo)">
        </div>
        <div class="col-md-6 col-lg-3 py-3 py-md-5">
          <div class="label">Contact</div>
          <address>
              Rougemont 2.0
              <br/>GSI de l’Université de Genève
              <br/>Sciences II
              <br/>Quai Ernest-Ansermet 30
              <br/>Case postale
              <br/>CH - 1211 Genève 4
              <br/><a href="mailto:rougemont@unige.ch">rougemont@unige.ch</a>
          </address>
        </div>
        <div class="col-md-6 col-lg-3 py-3 py-md-5">
          <div class="label">Conditions d'usage</div>
          <p>
            Sauf indication contraire, les contenus de ce site sont publiés sous une licence Creative commons CC-BY-NC, 4.0.
          </p>
          <div id="loginout"><?php  echo Core::make('helper/navigation')->getLogInOutLink()?></div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php  $this->inc('elements/footer_bottom.php');?>
