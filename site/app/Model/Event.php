<?php
	

	class Event extends AppModel
	{
		var $name="Event";
 		
 		var $hasMany = 'Programme';

 		public $hasAndBelongsToMany = array(
	        'Participant' =>
	            array(
	                'className' => 'Participant',
	                'joinTable' => 'events_participants',
	                'foreignKey' => 'event_id',
	                'associationForeignKey' => 'participant_id',
	                'unique' => true,
	                'with' => 'EventsParticipant'
	            )
    	);
 	}
?>