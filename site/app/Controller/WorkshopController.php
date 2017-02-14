<?php

	class WorkshopController extends AppController
	{
		
		var $name="Workshop";
		function index(){
			$this->loadModel('Participant');
			$q = $this->Participant->EventsParticipant->find('all', array(
				'conditions' => array('EventsParticipant.event_id' => 2, 'EventsParticipant.valide' => true, 'Participant.LISTED' => true),
				'fields' => array('Participant.FIRST_NAME', 'Participant.LAST_NAME', 'Participant.INSTITUTION', 'Participant.COUNTRY'),
				'order' => array('Participant.LAST_NAME')));
			$this->set('participant', $q);

			$this->loadModel('Programme');
			$test = $this->Programme->Event->find('first', array('conditions'=>array('ID'=>2)));
			$days = $test['Event']['TOTAL_DAY'];
			
			
			for($i=1; $i<=$days; $i++){
				$q = $this->Programme->find('all', array(
					'conditions' => array('DAY' => $i, 'EVENT_ID' => 2),
					'fields' => array('TIME_BEGIN', 'TIME_END', 'TITLE', 'SPEAKER', 'DESCRIPTION', 'DAY', 'BREAK'),
					'order' => array('DAY', 'TIME_BEGIN')));
				$this->set('day'.$i, $q);
			}

			$this->set('event', $test);
		}
	}

?>
