<?php

	class EventsRubric extends AppModel
	{
		var $name="EventsRubric";
		
		var $belongsTo=array('Event', 'Rubric');

	}

?>