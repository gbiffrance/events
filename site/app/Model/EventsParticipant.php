<?php

	class EventsParticipant extends AppModel
	{
		var $name="EventsParticipant";
		
		var $belongsTo=array('Event', 'Participant');

	}

?>