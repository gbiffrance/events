<?php
    $this->Html->addCrumb('Registration', array('controller' => 'participants', 'action' => 'add'));
    echo $this->Form->create('Participant');
?>

<div id="add_participant">
    <h3> Inscription </h3>

    <fieldset class="register">
            <div>
    <?php
            echo $this->Form->error('name', null, array('wrap' => 'label', 'class' => 'error')); 
            echo $this->Form->input('FIRST_NAME', 
                                    array(
                                            "maxlength"=>"50", 
                                            "label" => "Pr&eacute;nom *", 
                                            "required",  
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-6')
                                    ));
            echo $this->Form->input('LAST_NAME', 
                                    array(
                                            "maxlength"=>"50",
                                            "label" => "Nom *", 
                                            "required",
                                            'class'=>"input-add-participant", 
                                            'div' => array('class' => 'col-md-6')
                                    ));
            echo $this->Form->input('INSTITUTION', 
                                    array(
                                            "maxlength"=>"100",
                                            "type"=>"text",
                                            "required",  
                                            "label" => "Institution ou dispositif d'observation *", 
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-6')
                                    ));
            echo $this->Form->input('EMAIL', 
                                    array(
                                            "maxlength"=>"50",
                                            "type"=>"email", 
                                            "required", 
                                            "label" => "E-mail *", 
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-6')
                                    ));
            echo $this->Form->input('FONCTION', 
                                    array(
                                            "maxlength"=>"50",
                                            "type"=>"text", 
                                            "label" => "Position",
                                            'class'=>"input-add-participant", 
                                            'div' => array('class' => 'col-md-6')
                                    ));
            echo $this->Form->input('COUNTRY', 
                                    array(
                                            "maxlength"=>"50",
                                            "type"=>"text", 
                                            "label" => "Pays", 
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-6')
                                    ));
             echo $this->Form->input('DIETARY', 
                                    array(
                                            "maxlength"=>"250",
                                            "type"=>"text", 
                                            "label" => "Est-ce que vous avez un r&eacute;gime sp&eacute;cial ? ", 
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-12')
                                    ));
             echo $this->Form->input('LISTED',
                                    array(
                                            "options" => array(
                                                '1' => 'Oui',
                                                '0' => 'Non'
                                            ),
                                            "empty"=> false,
                                            "label"=>"Mon nom peut-être listé sur le site internet *",
                                            'class'=>"input-add-participant",
                                            'div' => array('class' => 'col-md-12')
                                    ));
    
	echo $this->Form->input('Event.id', array('type'=>'hidden', 'value'=>3));

            echo "<div class=\"mandatory\"><h6 class=\"muted text-left col-md-6\"> * Champs obligatoires</h6></div>";
            echo $this->Form->end(array(
                                            "type"=>"submit", 
                                            "label" => "S'inscrire",
                                            "class" => "btn btn-default",
                                            'div' =>"col-md-6"
                                    )); 
    ?>
    </div>
    </fieldset>
<!--<b>Les inscriptions à la formation sont désormais closes.</b>-->
    
</div>
