<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer>
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
							<!-- <li><a href="">Aaaaaa</a></li>
							<li><a href="">Aaaaaa</a></li>
							<li><a href="">Aaaaaa</a></li> -->
							<li><a href="">Fondation privée genevoise</a></li>
							<li><a href="">Mme François Demole</a></li>
							<li><a href="">Fondation Jan Michalski</a></li>
							<li><a href="">Fondation UBS pour la culture </a></li>
							<li><a href="">Fondation Ernst et Lucie Schmidheiny </a></li>
							<li><a href="">Fondation de famille Sandoz</a></li>
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
						<!-- <a href="" >
							<img src="img/icon/twitter.svg" alt="Twitter Rougemont 2.0">
						</a> -->
						<h5>Xxxxxxxx x xxx</h5>
						<ul>
							<li><a href="">Xxxxx x xxx x xxx</a></li>
							<li><a href="">Xxxxxxx x xxx x xxx</a></li>
							<li><a href="">Xxxxxxxx x xxx</a></li>
							<li><a href="">Xxxxxxx x xxx x xxx</a></li>
							<li><a href="">Xxxxxxxx</a></li>
							<li><a href="">Xxxxxxx x xxx x xxx</a></li>
						</ul>
            <div id="loginout"><?php  echo Core::make('helper/navigation')->getLogInOutLink()?></div>
					</div>
				</div>
			</div>
		</div>
	</nav>
</footer>



<?php  $this->inc('elements/footer_bottom.php');?>
