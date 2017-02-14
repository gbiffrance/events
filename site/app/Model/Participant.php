<?php

class Participant extends AppModel{
	var $name="Participant";

  public $hasAndBelongsToMany = array(
          'Event' =>
              array(
                  'className' => 'Event',
                  'joinTable' => 'events_participants',
                  'foreignKey' => 'participant_id',
                  'associationForeignKey' => 'event_id',
                  'unique' => true,
                  'with' => 'EventsParticipant'
              )
      );

	public $validate = array(
            'FIRST_NAME' => array(
              	'rule' => array('maxLength', '50'),
              	'required' => true,
              	'allowEmpty' => false,   
              	'message' => 'Maximum size : 50 characters'),
            'LAST_NAME' => array(
              	'rule' => array('maxLength', '50'),
              	'required' => true,
              	'allowEmpty' => false,  
              	'message' => 'Maximum size : 50 characters'),
            'EMAIL' => array(
                  'maxLength' => array(
                    'rule'    => array('maxLength', 50),
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => 'Maximum size : 50 characters'
                  )
                ),
           'INSTITUTION' => array(
              	'rule' => array('maxLength', '300'),
              	'required' => true,
              	'allowEmpty' => false,   
              	'message' => 'La taille maximale de votre institution est de 300 caractères'),
            'FUNCTION' => array(
                'rule' => array('maxLength', '100'),
                'required' => false,
                'allowEmpty' => true,   
                'message' => 'Maximum size : 100 characters'),
            'COUNTRY' => array(
                'rule' => array('maxLength', '50'),
                'required' => false,
                'allowEmpty' => true,   
                'message' => 'Maximum size : 50 characters'),
            'LISTED' => array(
                'rule' => array('boolean'),
                'required' => true),
            'DIETARY' => array(
                'rule' => array('maxLength', '250'),
                'required' => false,
                'allowEmpty' => true
            )
		);	
}

?>
