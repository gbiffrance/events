<footer>
 	<div>
	  	<ul>
			<li>
				<a target="_blank" href="http://twitter.com/gbiffrance" title="Rejoignez sous sur Twitter !">
					<?php echo "<img width=\"28\" height=\"28\" src=\"".Configure::read('site')."/img/logo/twitter.png\" alt=\"twitter logo\">" ?>
				</a>
			</li>
			<li>
				<a target="_blank" title="Page Facebook du GBIF" href="https://www.facebook.com/gbifnews">
					<?php echo "<img width=\"28\" height=\"28\" src=\"".Configure::read('site')."/img/logo/facebook.png\" alt=\"Facebook logo\">" ?>
				</a> 
			</li>
		</ul>
	</div> 
	<div >
	  	<ul id="footer-link">
	  		<li ><a  target="_blank" title="" href="http://www.gbif.fr">GBIF France</a></li>
			<li ><a target="_blank" title="" href="http://www.gbif.fr/contact">Contact</a></li>
			<li ><a title="" href="/home">Mention légale</a></li>
			<?php if(AuthComponent::user('id')): ?>
			<li ><a title="" href="/users/logout">Se déconnecter</a></li>
			<li ><a title="" href="/users/restricted">Administration</a></li>
		    <?php else: ?>
			<li ><a title="" href="/users/login">Se connecter</a></li>
		    <?php endif; ?>
			<li ><a  target="_blank" title="" href="http://www.gbif.fr/page/partenaires">Partenaire du GBIF France</a></li>
		</ul>
	</div> 
	<address class="footer-margin" > 
  		<p>
  			GBIF FRANCE ● MNHN Géologie&nbsp;●&nbsp;43 rue Buffon CP 48 &ndash;&nbsp;75005 Paris&nbsp;&nbsp;&ndash; &nbsp;France <span style="line-height:1.6">&nbsp;</span>&ndash;&nbsp;<span style="line-height:1.6">Phone : +33 (0)1 40 79 80 65</span>
  		</p>
  	</address>
	</div> 

 </footer> 

 <!-- <footer>
      <ul>
        <li><a href="http://www.gbif.fr"> A propos du GBIF France </a></li>
        <li><a href="http://www.gbif.fr/?page_id=355"> Contact </a></li>
        <li><a href="http://twitter.com/gbiffrance"><i class="icon-twitter"></i> Suivre GBIF France </a></li>
        <li><a href="https://twitter.com/bioveleu"><i class="icon-twitter"></i> Suivre BioVel </a></li>
      </ul>
 </footer> -->

