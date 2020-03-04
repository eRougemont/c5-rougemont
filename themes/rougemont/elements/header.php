<?php  defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
?>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col3 logo">
							<div id="portrait">
								<a href="">
									<img src="<?php  echo $view->getThemePath()?>/img/ddr-signature.svg" alt="Denis de Rougemont, signature"/>
									<span>
										L'intégrale de
										<br/>Denis de Rougemont<br/>
										en libre accès
									</span>

								</a>
							</div>
            </div>
            <div class="col-9">
								<div class="row">
									<div class="col-12 flex flex-right search-form-container">
                    <?php
                    $a = new GlobalArea('Header Search');
                    $a->display();
                    ?>
									</div>
									<div class="col-12 headnav">
                <?php
                $a = new GlobalArea('Header Navigation');
                $a->display();
                ?>
									</div>
								</div>

							</div>
        </div>
    </div>
</header>
