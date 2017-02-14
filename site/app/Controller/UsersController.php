<?php

	class UsersController extends AppController
	{
		var $name="Users";

		public function beforeFilter(){
			parent::beforeFilter();
		}

	 	public function restricted(){
	 		$this->loadModel('Event');
	 		$this->Event->recursive=-1;
	 		$listEvent = $this->Event->find('all', array(
	 												'conditions' => array('valide' => 1),
	 												'fields' => array('id', 'NAME')));
	 		$this->set('listEvent', $listEvent);
		}

		public function logout(){
			$this->redirect($this->Auth->logout());
		}

		// public function beforeFilter() {
  //       	parent::beforeFilter();
  //       	$this->Auth->allow('add', 'logout');
  //  		}

		public function login(){
		    if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		            return $this->redirect(array('action'=>'restricted'));
		        } else {
		            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
		        }
		    }
		}

	    public function add() {
	        if ($this->request->is('post')) {
	            $this->User->create();
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('L\'user a été sauvegardé'));
	                return $this->redirect(array('action' => 'index'));
	            } else {
	                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
	            }
	        }
	    }

	   
	}

?>
