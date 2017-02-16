<?php

class Rubric extends AppModel
{
	var $name="Rubrics";

	  public $hasAndBelongsToMany = array(
          'Event' =>
              array(
                  'className' => 'Event',
                  'joinTable' => 'events_rubrics',
                  'foreignKey' => 'rubric_id',
                  'associationForeignKey' => 'event_id',
                  'unique' => false,
                  'with' => 'EventsRubric'
              )
      );
}

?>
