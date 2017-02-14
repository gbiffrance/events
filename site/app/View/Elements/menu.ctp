<?php	
$rubrics = $this->requestAction('rubrics/show'); 
if ($rubrics)
{ 
?>
	<ul class="nav">
		<?php
			foreach ($rubrics as $rubric)
			{	
				
				$name = $rubric['Rubric']['NAME'];
				$link = $rubric['Rubric']['LINK'];
				if($name != 'Poster' && $name != 'Workshop' && $name != 'GBIF France'){
					echo "<li class=\"menu\"> <a href=".$link.">".$name."</a></li>";
				} else if($name == 'GBIF France'){
					echo "<li class=\"menu\"> <a target=\"_blank\" href=".$link.">".$name."</a></li>";
				}
			}
		?>
	</ul>
<?php       
}
?>
