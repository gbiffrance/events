<div id="participant">

	<h3> Liste des participants </h3>

	<table class="table table-bordered">
	<tr>
		<th class="compteur">#</th>
		<th class="nom-complet">Nom</th>
		<th class="instit">Institution</th>
		<!--<th class="pays">Country</th>-->
	<tr>
	<?php
		$nombre=1;
		foreach($participant as $a){
			echo "<tr>";
				echo "<td class=\"compteur\">".$nombre."</td>";
				echo "<td class=\"firstname nom-complet\">".$a['Participant']['FIRST_NAME']." ".$a['Participant']['LAST_NAME']."</td>";
				echo "<td class=\"institution instit\">".$a['Participant']['INSTITUTION']."</td>";
			//	echo "<td class=\"country pays\">&nbsp;".$a['Participant']['COUNTRY']."</td>";
			echo "</tr>";
			$nombre=$nombre+1;
		}
	?>

	</table>

</div>
