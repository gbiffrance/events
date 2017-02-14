<?php

	class RubricsController extends AppController
	{
		var $name="Rubrics";
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('show');
		}
		function show(){
			return $q = $this->Rubric->find('all', array(
				'conditions' => array('VALIDE' => 1)));
		}
	}

?>
