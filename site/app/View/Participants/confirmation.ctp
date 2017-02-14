<div id="confirmation_participant">

<p class="validation">
	<strong>La validation des participants a bien été prises en compte. Un email de confirmation a été envoyés aux personnes concernées.</strong>
</p>

<?php echo "<h3> Liste des participants confirmés - ".$eventName." </h3>"; ?>

	<table class="table table-bordered">
	<tr>
		<th class="compteur">#</th>
		<th class="nom-complet"> Nom complet </th>
		<th class="instit"> Institution </th>
		<th class="pays"> Pays </th>
	<tr>
	<?php
		$nombre=1;
		foreach($participant as $a){
			echo "<tr>";
				echo "<td class=\"compteur\">".$nombre."</td>";
				echo "<td class=\"nom-complet\">&nbsp;".$a['Participant']['FIRST_NAME']." ".$a['Participant']['LAST_NAME']."</td>";
				echo "<td class=\"institution instit\">&nbsp;".$a['Participant']['INSTITUTION']."</td>";
				echo "<td class=\"country pays\">&nbsp;".$a['Participant']['COUNTRY']."</td>";
			echo "</tr>";
			$nombre=$nombre+1;
		}
	?>

	</table>

</div>