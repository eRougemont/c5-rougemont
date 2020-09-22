<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer id="footer">
  <div class="logos bg-black">
    <div class="container">
      <div class="row pt-5 pb-5">
        <div class="col gsi">
          <img src="<?php  echo $view->getThemePath()?>/img/gsi.png" alt="Unige Global Studies Institute (logo)">
        </div>
        <div class="col bpun">
          <img src="<?php  echo $view->getThemePath()?>/img/bpun.gif" alt="Bibliothèque Publique et Université de Neuchâtel (logo)">
        </div>
        <div class="col cec">
          <img src="<?php  echo $view->getThemePath()?>/img/cec.png" alt="Centre Européen de la Culture (logo)">
        </div>
        <div class="col heid">
          <img src="<?php  echo $view->getThemePath()?>/img/heid.gif" alt="Institut des Hautes Études Internationales et du Développement (logo)">
        </div>
        <div class="col rts">
          <img src="<?php  echo $view->getThemePath()?>/img/rts-archives.gif" alt="Radio Télévision Suisse (logo)">
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark">
    <div class="container ">
      <div class="row">
        <div class="col-md-6 col-lg-3  pt-3 pb-3 pt-md-5 pb-md-5">
          <div class="label">Soutiens financiers</div>
          <ul>
            <li>Fondation privée genevoise</li>
            <li>Mme Françoise Demole</li>
            <li>Fondation Jan Michalski</li>
            <li>Fondation UBS pour la culture</li>
            <li>Fondation Ernst et Lucie Schmidheiny</li>
            <li>Fondation de famille Sandoz</li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 pt-3 pb-3 pt-md-5 pb-md-5">
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
        <div class="col-md-6 col-lg-3 pt-3 pb-3 pt-md-5 pb-md-5">
          <div class="label">Conditions d'usage</div>
          <p>
            Sauf indication contraire, les contenus de ce site sont publiés sous une licence Creative commons CC-BY-NC, 4.0.
          </p>
        </div>
        <div class="col-md-6 col-lg-3 pt-3 pb-3 pt-md-5 pb-md-5">
          <div class="label">Partenaires</div>
          <ul>
            <li>BPU de Neuchâtel</li>
            <li>Centre européen de la culture</li>
            <li>Bibliothèque de l’IHEID</li>
            <li>Archives de la RTS</li>
          </ul>
          <div id="loginout"><?php  echo Core::make('helper/navigation')->getLogInOutLink()?></div>
        </div>
      </div>
    </div>
  </div>
</footer>



<?php  $this->inc('elements/footer_bottom.php');?>
