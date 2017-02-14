

<div >
 	<?php
		var_dump($events);
	?>
	<br><br>
	<?php
		$nombre=1;
		foreach($events as $a){
			echo "<tr>";
				echo "<td>".$nombre."</td>";
				echo "<td class=\"firstname\">".$a['Event']['ID']."</td>";
				echo "<td class=\"name\">".$a['Event']['NAME']."</td>";
				echo "<td class=\"institution\">".$a['Programme'][0]['ID']."</td>";
				echo "<td class=\"country\">".$a['Programme'][0]['DESCRIPTION']."</td>";
			echo "</tr>";
			$nombre=$nombre+1;
		}
	?>


</div>
