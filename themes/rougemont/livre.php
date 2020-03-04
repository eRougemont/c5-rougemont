<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>
  <div>
    <div class="container">
    	<div class="row">

				<div class="col-12 marg-top-xl marg-bottom-xl" id="chapo">
          <?php
             $a = new Area('livre_chapo');
             $a->display($c);
          ?>
				</div>


				<div class="col-4">
          <img src=""/>
          <?php  echo $c->getCollectionName(); echo "<br/>". $c->getCollectionPath();  ?>
        </div>

				<div class="col-8">
          <?php
             $a = new Area('livre_notice');
             $a->display($c);
          ?>
				</div>

			</div>
		</div>

    <div class="bkg-color-brightest pad-top-xl pad-bottom-xl">
  		<div class="container">
  			<div class="row">
  				<div class="col-6" id="biblio">
            <?php
               $a = new Area('livre_biblio');
               $a->display($c);
            ?>
  				</div>
					<div class="col-6">
				    <nav class="toclocal" id="toc">
              <button onclick="
                  if (!this.last) { this.parentNode.className='toclocal all'; this.last = this.innerHTML; this.innerHTML = 'Sommaire -';}
                  else {this.parentNode.className='toclocal'; this.innerHTML = this.last; this.last = null;}
              ">Sommaire +</button>
              <?php
                 $a = new Area('livre_sommaire');
                 $a->display($c);
              ?>
            </nav>
  			  </div>
  			</div>
  		</div>
  	</div>
  </div>
</main>

<?php   $this->inc('elements/footer.php'); ?>