<?php

	class Institution extends AppModel
	{
		var $name="Institution";
		public $hasMany = 'Event';
	}

?>