<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer id="footer">
	<div class="logos bkg-black">
		<div class="container">
			<div class="row pad-top-xxl pad-bottom-xxl">
				<div class="col gsi">
					<a href="">
						<img src="<?php  echo $view->getThemePath()?>/img/gsi.gif" alt="Unige Global Studies Institute (logo)">
					</a>
				</div>
				<div class="col bpun">
					<a href="">
						<img src="<?php  echo $view->getThemePath()?>/img/bpun.gif" alt="Bibliothèque Publique et Université de Neuchâtel (logo)">
					</a>
				</div>
				<div class="col cec">
					<a href="">
						<img src="<?php  echo $view->getThemePath()?>/img/cec.png" alt="Centre Européen de la Culture (logo)">
					</a>
				</div>
				<div class="col heid">
					<a href="">
						<img src="<?php  echo $view->getThemePath()?>/img/heid.gif" alt="Institut des Hautes Études Internationales et du Développement (logo)">
					</a>
				</div>
				<div class="col rts">
					<a href="">
						<img src="<?php  echo $view->getThemePath()?>/img/rts.gif" alt="Radio Télévision Suisse (logo)">
					</a>
				</div>
			</div>
		</div>
	</div>
	<nav>
		<div class="bkg-color-darker">
			<div class="container ">
				<div class="row">
					<div class="col-3">
						<h5>Soutiens financiers</h5>
						<ul>
							<li>Fondation privée genevoise</li>
							<li>Mme François Demole</li>
							<li>Fondation Jan Michalski</li>
							<li>Fondation UBS pour la culture</li>
							<li>Fondation Ernst et Lucie Schmidheiny</li>
							<li>Fondation de famille Sandoz</li>
						</ul>
					</div>
					<div class="col-3">
						<h5>Contact</h5>
						<p>
							Rougemont 2.0<br/>
							GSI de l’Université de Genève Sciences II,
							Quai Ernest-Ansermet 30 Case postale
							CH - 1211 Genève 4<br/>
							<a href="mailto:rougemont@unige.ch">rougemont@unige.ch</a>
						</p>
					</div>
					<div class="col-3">
						<h5>Conditions d'usage</h5>
						<p>
							Sauf indication contraire, les contenus de ce site sont publiés sous une licence Creative commons CC-BY-NC, 4.0.
						</p>
					</div>
					<div class="col-3">
						<h5>Partenaires</h5>
						<ul>
              <li>GSI de l’Université de Genève</li>
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
	</nav>
</footer>



<?php  $this->inc('elements/footer_bottom.php');?>
