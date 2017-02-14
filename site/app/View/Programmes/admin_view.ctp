<div id="edit_agenda">

	<?php echo "<h3> Modification de l'agenda - ".$Event['Event']['NAME']." </h3>"; ?>

	<?php
            $number=1;
            $date = strtotime(date("Y-m-d", strtotime($Event['Event']['DATE_BEGIN'])));
            for($i=1; $i<=$Event['Event']['TOTAL_DAY']; $i++){
                $option[$number] = date("d/m/Y", $date);
                $date = strtotime(date("Y-m-d", $date) . " +1 day");
                $number++;
            }

			for($i=1; $i<=$Event['Event']['TOTAL_DAY']; $i++){

				echo "<h5>Day ".$i." : ".$option[$i]."</h5>";
				echo "<table class=\"table table-bordered table-hover\" >";
				echo "<thead>";
				echo "<tr>";
						echo "<th class=\"schedule\"> Schedule </th>";
						echo "<th class=\"speaker\"> Speaker </th>";
						echo "<th class=\"description\"> Description </th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				foreach(${'day'.$i} as $p){
					echo "<tr onclick=\"window.document.location='/formation_septembre2015/programmes/edit/".$p['Programme']['ID']."' ;\">";
						echo "<td>&nbsp;".$p['Programme']['TIME_BEGIN']." - ".$p['Programme']['TIME_END']."</td>";
						if($p['Programme']['SPEAKER'] != NULL){
							echo "<td>&nbsp;".$p['Programme']['SPEAKER']."</td>";
							echo "<td>&nbsp;<strong>".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";
						} else {
							echo "<td colspan=\"2\">&nbsp;<strong>".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";
						}
					echo "</tr>";	
				}
				echo "</tbody>";
				echo "</table>";
			}

		?>

</div>
