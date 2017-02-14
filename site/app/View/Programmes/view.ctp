
<?php
        $this->Html->addCrumb('Programme', '/programme/show');
?>

<div id="programm">
	<h3>Programme</h3>

<p> Acc&egrave;s aux vid&eacute;os de la formation : <strong><a target="_blank" href="http://formation.gbif.fr">Site des formation du GBIF France</a></strong> <br />
<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> T&eacute;l&eacute;charger le programme :<strong><a href="/files/Agenda_formation_gbiffrance.pdf"> PDF</a></strong>
<br />
<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> T&eacute;l&eacute;charger toutes les pr&eacute;sentations : <strong><a href="/files/Formation-ecoscope.zip">fichier ZIP</a></strong>		
<?php

			$number=1;
            $date = strtotime(date("Y-m-d", strtotime($event['Event']['DATE_BEGIN'])));
            for($i=1; $i<=$event['Event']['TOTAL_DAY']; $i++){
                $option[$number] = date("d/m/Y", $date);
                $date = strtotime(date("Y-m-d", $date) . " +1 day");
                $number++;
            }

			for($i=1; $i<=$event['Event']['TOTAL_DAY']; $i++){

				echo "<h5>Jour ".$i." : ".$option[$i]."</h5>";
				echo "<table class=\"table table-bordered\" >";

				echo "<tr>";
						echo "<th class=\"schedule\"> Horaire </th>";
     						echo "<th class=\"description\"> Description </th>";
						echo "<th class=\"speaker\"> Intervenant(e)(s) </th>";
				echo "</tr>";

				foreach(${'day'.$i} as $p){
					echo "<tr>";
						//echo "<td>&nbsp;".$p['Programme']['TIME_BEGIN']." - ".$p['Programme']['TIME_END']."</td>";
						echo "<td>&nbsp;".$this->Time->format($p['Programme']['TIME_BEGIN'], '%H:%M')." - ".$this->Time->format($p['Programme']['TIME_END'], '%H:%M')."</td>";
						if($p['Programme']['SPEAKER'] != NULL){
							echo "<td>&nbsp;<strong>".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";							
							echo "<td>&nbsp;".$p['Programme']['SPEAKER']."</td>";
						} else {
							echo "<td colspan=\"2\">&nbsp;<strong>".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";
						}
					echo "</tr>";	
				}
				echo "</table>";
			}

		?>

</div>
