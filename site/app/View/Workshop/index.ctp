<div id="workshop">
	<h3>Workshop Atlas of Living Europe</h3>
	<div class="corps">
	 Due to the strong interest for ALA-based Node Portal in Europe, a
workshop will be organized as side event of the European Nodes Meeting.
 The Atlas of Living Europe workshop will be held on 4-5 May at Paris
MNHN. <br /> <br />
 It will be a sequel of the ALA Workshop held in Canberra last year.
 It is mostly suited for developers working on Nodes Data Portal, but
some Node Managers might want to attend the first day.
</div>

	<h5>Programme (temporary)</h5>
<div class="items">
The meeting will cover the following aspects at a minimum, with other topics to be considered depending on the requests from the participants:
  <ul>
        <li>installation (hands on - please bring a dev laptop.  Amazon EC2 instances will be provided where required)</li>
        <li>overview of the general architecture</li>
        <li>loading your first datasets and understanding what is happening</li>
        <li>progress since Canberra meeting (update on progress on species pages, and the UK Wildlife Portal demonstration)</li>
        <li>feedback / experiences from those who have adopted the software </li>
        <li>project governance discussion - thoughts from the group, pull requests, peer reviews, issues etc</li>
        <li>some planning for some training materials, and documentation (multilingual)</li>
    </ul>

</div>
<h5>Information</h5>
<?php 
			$number=1;
            $date = strtotime(date("Y-m-d", strtotime($event['Event']['DATE_BEGIN'])));
            for($i=1; $i<=$event['Event']['TOTAL_DAY']; $i++){
                $option[$number] = date("d/m/Y", $date);
                $date = strtotime(date("Y-m-d", $date) . " +1 day");
                $number++;
            }

			for($i=1; $i<=$event['Event']['TOTAL_DAY']; $i++){

				echo "<h5>Day ".$i." : ".$option[$i]."</h5>";
				echo "<table class=\"table table-bordered\" >";

				echo "<tr>";
						echo "<th class=\"schedule\"> Schedule </th>";
						echo "<th class=\"speaker\"> Speaker </th>";
						echo "<th class=\"description\"> Description </th>";
				echo "</tr>";

				foreach(${'day'.$i} as $p){
					echo "<tr>";
						echo "<td>&nbsp;".$p['Programme']['TIME_BEGIN']." - ".$p['Programme']['TIME_END']."</td>";
						if($p['Programme']['SPEAKER'] != NULL){
							echo "<td>&nbsp;".$p['Programme']['SPEAKER']."</td>";
							echo "<td>&nbsp;<strong>".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";
						} else {
							echo "<td colspan=\"2\"><strong>&nbsp;".$p['Programme']['TITLE']."</strong><br>".$p['Programme']['DESCRIPTION']."</td>";
						}
					echo "</tr>";	
				}
				echo "</table>";
			}

		?>

	<h5>Participant list</h5>

	<table class="table table-bordered">
	<tr>
		<th class="compteur">#</th>
		<th> Name </th>
		<th> Institution </th>
		<th> Country </th>
	<tr>
	<?php
		$nombre=1;
		foreach($participant as $a){
			echo "<tr>";
				echo "<td class=\"compteur\">".$nombre."</td>";
				echo "<td class=\"firstname nom-complet\">&nbsp;".$a['Participant']['FIRST_NAME']." ".$a['Participant']['LAST_NAME']."</td>";
				echo "<td class=\"institution instit\">&nbsp;".$a['Participant']['INSTITUTION']."</td>";
				echo "<td class=\"country pays\">&nbsp;".$a['Participant']['COUNTRY']."</td>";
			echo "</tr>";
			$nombre=$nombre+1;
		}
	?>

	</table>
</div>
