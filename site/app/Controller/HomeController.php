<?php

	class HomeController extends AppController
	{
		var $name="Home";
		public function beforeFilter(){
			$this->Auth->allow('index', 'validation', 'refus');
		}

		function index(){
		}

		function validation(){
		}
		function refus(){
		}
	}

?>
