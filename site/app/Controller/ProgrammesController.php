<?php

	class ProgrammesController extends AppController
	{
		var $name="Programmes";
		

		function view(){
			//$test = $this->Programme->Event->find();
			$test = $this->Programme->Event->find('first', array('conditions'=>array('ID'=>3)));
			$days = $test['Event']['TOTAL_DAY'];
			
			for($i=1; $i<=$days; $i++){
				$q = $this->Programme->find('all', array(
					'conditions' => array('DAY' => $i, 'EVENT_ID' => 3),
					'fields' => array('TIME_BEGIN', 'TIME_END', 'TITLE', 'SPEAKER', 'DESCRIPTION', 'DAY', 'BREAK'),
					'order' => array('DAY', 'TIME_BEGIN')));
				$this->set('day'.$i, $q);
			}

			$this->set('event', $test);
		}

		function add($event_id = null){

			if(!$event_id) {
				throw new NotFoundException(__('Invalid event'));
			}
			// $test = $this->Programme->Event->find();
			// $days = $test['Event']['TOTAL_DAY'];
			// $day1 = $test['Event']['DATE_BEGIN'];
			// $eventId =$test['Event']['id'];

			$test = $this->Programme->Event->find('first', array('conditions' => array('Event.ID' => $event_id)));


			$this->set('event', $test);

			if($this->request->is('post'))
			{
				$this->Programme->create($this->request->data["Programmes"]);
				if($this->Programme->save()){
					return $this-> redirect('/Programmes/add/'.$test['Event']['id']);
				}else{
					debug($this->Programme->validationErrors);					
				}
			}      	
		}

		function edit($id = null){
			

			if(!$id) {
				throw new NotFoundException(__('Invalid programme'));
			} 
			$programme = $this->Programme->findById($id);

			if($this->request->is('get')) { 

				$test = $this->Programme->Event->find('first', array('conditions' => array('Event.ID' => $programme['Programme']['event_id'])));

				$days = $test['Event']['TOTAL_DAY'];

				$this->set('event', $test);

				$this->request->data = $programme;   
			}

			if($this->request->is('post') || $this->request->is('put')) { 
      			$this->Programme->id = $id; 
       			if ($this->Programme->save($this->request->data)) {
		            $this->Session->setFlash(__('Your programme has been updated.'));
		            $this-> redirect('/programmes/admin_view/'.$programme['Event']['id']);
		        }
        		$this->Session->setFlash(__('Unable to update your programme.'));
       			
   			} 
		}

		function admin_view($event_id = null){
			if(!$event_id ) {
				throw new NotFoundException(__('Invalid event'));
			}

			$test = $this->Programme->Event->find('first', array('conditions' => array('Event.ID' => $event_id)));
			$days = $test['Event']['TOTAL_DAY'];
			
			for($i=1; $i<=$days; $i++){
				$q = $this->Programme->find('all', array(
					'conditions' => array('DAY' => $i, 'EVENT_ID' =>$event_id),
					'fields' => array('ID', 'TIME_BEGIN', 'TIME_END', 'TITLE', 'SPEAKER', 'DESCRIPTION', 'DAY', 'BREAK'),
					'order' => array('DAY', 'TIME_BEGIN')));
				$this->set('day'.$i, $q);
			}

			$this->set('Event', $test);
		} 

	}

?>
