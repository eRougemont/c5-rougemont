<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$basename = basename($c->getCollectionPath());
?>

<main>
  <div>
    <div class="container">
    	<div class="row">

				<div class="col-12 marg-top-xl marg-bottom-xl" id="chapo">
				  <a href="<?php echo $basename; ?>/1" class="btn btn-plain btn-plain-red">Lire</a>
          <?php
             $a = new Area('livre_chapo');
             $a->display($c);
          ?>
				</div>


				<div class="col-4 pb-4">
				  <a href="<?php echo $basename; ?>/1">
          <img src="https://iiif.unige.ch/iiif/2/rougemont/ddr-divers/couv/<?php  echo $basename; ?>_couv.jpg/full/350,/0/default.jpg"/>
          </a>
        </div>

				<div class="col-8">
          <?php
             $a = new Area('livre_notice');
             $a->display($c);

            $prevnext = new GlobalArea('prev_next');
            $prevnext->display($c);
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
