<?php


	class Programme extends AppModel
	{
		var $name="Programme";

		var $belongsTo= 'Event';

		public $valide = array(
			 'TITLE' => array(
              	'rule' => array('maxLength', '250'),
              	'required' => true,
              	'allowEmpty' => false,   
              	'message' => 'Taille maximum : 250 caractères'),
            'DAY' => array(
              	'rule' => array('maxLength', '11'),
              	'required' => true,
              	'allowEmpty' => false ),
            'TIME_BEGIN' => array(
              	'rule' => 'time',
              	'required' => true,
              	'allowEmpty' => false),
           'TIME_END' => array(
              	'rule' => 'time',
              	'required' => true,
              	'allowEmpty' => false),
            'DESCRIPTION' => array(
                'rule' => array('maxLength', '1000'),
                'required' => false,
                'allowEmpty' => true,   
                'message' => 'Taille maximum : 1000 caractères'),
            'BREAK' => array(
                'rule' => array('boolean'),
                'required' => false),
            'SPEAKER' => array(
                'rule' => array('maxLength', '250'),
              	'required' => false,
              	'allowEmpty' => true,   
              	'message' => 'Taille maximum : 250 caractères')
            );

		
	}

?>