<div id="event">
	<div class="entete">
		<h2><?php echo $currentEvent['Event']['title'];?></h2>
        <div id="img_entete"></div>
		<h3> <?php echo $currentEvent['Event']['subtitle']; ?></h3>
		<br />
        <h4><?php echo $currentEvent['Event']['date_txt']." - ".$currentEvent['Event']['town'] ?></h4>
        <h4><?php echo $currentEvent['Event']['institution_id'] ?></h4>
        <h4><?php echo $currentEvent['Event']['room'].", ".$currentEvent['Event']['address']?></h4>
    </div>
</div>
<div class="corps"><?php echo $currentEvent['Event']['description'] ?></div>
<h5 class="muted">Organismes liés au point nodal français du GBIF </h5>
<div class="logo_accueil">
	<div class="col-md-12">
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.enseignementsup-recherche.gouv.fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_menesr_250px.png\"></a>"?>		
		</div>
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.diplomatie.gouv.fr/fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_mafdi.jpg\"></a>"?>		
		</div>
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.developpement-durable.gouv.fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_meem.jpg\"></a>"?>
		</div>
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://agriculture.gouv.fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_maaf_250px.png\"></a>"?>		
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.mnhn.fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_mnhn_250px.png\"></a>"?>		
		</div>
		<div class="col-md-3">
			<?php echo "<img alt=\"UMS Patri-nat\" src=\"".Configure::read('site')."/img/logo/logo_ums2006_250px.png\"></a>"?>
		</div>
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.ird.fr\"> <img src=\"".Configure::read('site')."/img/logo/logo_ird_250px.png\"></a>"?>		
		</div>
		<div class="col-md-3">
			<?php echo "<a target=\"_blank\" href=\"http://www.upmc.fr\" > <img src=\"".Configure::read('site')."/img/logo/logo_upmc_250px.png\"></a>"?>		
		</div>
	</div>
</div>