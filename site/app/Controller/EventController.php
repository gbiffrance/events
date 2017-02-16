<?php

	class EventController extends AppController
	{
		var $name="Event";

		/* afficher la page d'accueil */
		function view(){
			$currentEvent = $this->Event->showEvent();
			$this->set('currentEvent', $currentEvent);

		}
	}

?>



		