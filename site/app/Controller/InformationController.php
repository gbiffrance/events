<?php

	class InformationController extends AppController
	{
		var $name="Information";
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('show');
		}
		function show(){
		}
	}

?>