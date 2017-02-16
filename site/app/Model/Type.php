<?php

	class Institution extends AppModel
	{
		var $name="Type";
		public $hasMany = 'Event';
	}

?>