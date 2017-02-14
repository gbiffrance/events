<div id="view_admin">



	<?php echo "<h3> Liste des participants - ".$eventName['Event']['NAME']." </h3>"; ?>

	<table class="table table-bordered">
	<tr>
		<th class="compteur">#</th>
		<th class="nom-complet"> Nom complet </th>
		<th class="email-address"> E-mail</th>
		<th class="fonction"> Fonction </th>
		<th class="instit"> Institution </th>
		<th class="pays"> Pays </th>
		<th class="dietary"> Régime alimentaire</th>
	<tr>
	<?php
		$nombre=1;
		foreach($participant as $a){
			echo "<tr>";
				echo "<td class=\"compteur\">".$nombre."</td>";
				echo "<td class=\"firstname nom-complet\">".$a['Participant']['FIRST_NAME']." ".$a['Participant']['LAST_NAME']."</td>";
				echo "<td class=\"email-address\">".$a['Participant']['EMAIL']."</td>";
				echo "<td class=\"fonction\">&nbsp;".$a['Participant']['FONCTION']."</td>";
				echo "<td class=\"institution instit\">".$a['Participant']['INSTITUTION']."</td>";
				echo "<td class=\"country pays\">&nbsp;".$a['Participant']['COUNTRY']."</td>";
				echo "<td class=\"dietary\">&nbsp;".$a['Participant']['DIETARY']."</td>";
			echo "</tr>";
			$nombre=$nombre+1;
		}
	?>

	</table>

</div>