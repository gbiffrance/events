<?php

	class HomeController extends AppController
	{
		var $name="Home";
		public function beforeFilter(){
			$this->Auth->allow('index');
		}

		function index(){
		}

	}

?>
