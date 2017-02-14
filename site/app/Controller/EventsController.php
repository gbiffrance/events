<?php

	class EventsController extends AppController
	{
		var $name="Events";
		

		function view(){
			$this->Event->recursive = 1;
      		$events = $this->Event->find('all');
      		$this->set('events', $events);
		}

	}

?>