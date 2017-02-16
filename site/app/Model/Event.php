<?php
	

	class Event extends AppModel
	{
		var $name="Event";


    public function showEvent(){
      $currentEvent = $this->find('first', array(
        'conditions' => array('Event.code_event' => Configure::read('codeEvent'))
      ));
      return $currentEvent;
    }
  }


    // var $hasOne = "Institution";
    // var $hasOne = "Type";

    // public $hasAndBelongsToMany = array(
    //       'Rubric' =>
    //           array(
    //               'className' => 'Rubric',
    //               'joinTable' => 'events_rubrics',
    //               'foreignKey' => 'event_id',
    //               'associationForeignKey' => 'rubric_id',
    //               'unique' => false,
    //               'with' => 'EventsRubrics'
    //           )
    //   );

      // public $validate = array(
     //        'title' => array(
     //           'rule' => array('maxLength', '100'),
     //           'required' => true,
     //           'allowEmpty' => false,   
     //           'message' => 'Maximum size : 100 characters'),
     //        'subtitle' => array(
     //           'rule' => array('maxLength', '150'),
     //           'required' => false,
     //           'allowEmpty' => true,  
     //           'message' => 'Maximum size : 150 characters'),
     //        'date_txt' => array(
     //            'rule'    => array('maxLength', 100),
     //            'required' => true,
     //            'allowEmpty' => false,
     //            'message' => 'Maximum size : 100 characters'),
     //        'town' => array(
     //           'rule' => array('maxLength', '100'),
     //           'required' => true,
     //            'allowEmpty' => false,   
     //           'message' => 'Maximum size : 100 characters'),
     //        'institution_id' => array(
     //             'required' => true,
     //            'allowEmpty' => false),   
     //        'address' => array(
     //            'rule' => array('maxLength', '150'),
     //            'required' => true,
     //            'allowEmpty' => false,   
     //            'message' => 'Maximum size : 150 characters'),
     //        'room' => array(
     //            'rule' => array('maxLength', '150'),
     //            'required' => true,
     //            'allowEmpty' => false,   
     //            'message' => 'Maximum size : 150 characters'),
     //        'description' => array(
     //            'required' => true,
     //            'allowEmpty' => false),   
     //        'date_begin_dt' => array(
     //            'required' => true,
     //            'allowEmpty' => false),   
     //        'date_end_dt' => array(
     //            'required' => true,
     //            'allowEmpty' => true),   
     //        'type_id' => array(
     //            'required' => true,
     //            'allowEmpty' => false),   
     //        'total_day' => array(
     //            'required' => true,
     //            'allowEmpty' => false),   
     //       );  

?>






 	
 		