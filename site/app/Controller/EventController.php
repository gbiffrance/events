<?php

	class EventController extends AppController
	{
		var $name="Event";

		/* afficher la page d'accueil */
		function view(){
			if (empty($this->request->data)) {
				$q = $this->Event->find('all', array(
					'conditions' => array('event.id' => 1),
					'fields' => array('event.title', 'event.subtitle', 'event.date_txt', 'event.town', 'event.institution_id', 'event.address', 'event.room')));
				$this->set('event', $q);
			}
		}
	}

?>



		