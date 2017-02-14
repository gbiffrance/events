<?php
    echo $this->Form->create('Programme');
?>

<div id="edit_agenda">

	<?php echo "<h3>Modification de l'agenda : ".$this->request->data['Event']['NAME']."</h3>"; ?>
	<fieldset>

        <div class="controls controls-row">
                        <?php
                                echo $this->Form->input('TITLE', 
                                                        array(
                                                                "maxlength"=>"250", 
                                                                "label" => "Titre *", 
                                                                "required",  
                                                                "class" => "input-add",
                                                                "div"=>array("class" => "col-md-10")
                                                        ));
                      
                    echo $this->Form->input('BREAK', 
                                            array(
                                                    "maxlength"=>"1",
                                                    "type"=>"checkbox",
                                                    "label" => "Pause",
                                                    "class" => "break-checkbox",
                                                    "div"=>array("class" => "col-md-2")
                                            ));
                      ?>
    </div>  
	<div class="controls controls-row">
    	<?php
            $number=1;
            $date = strtotime(date("Y-m-d", strtotime($this->request->data['Event']['DATE_BEGIN'])));
            for($i=1; $i<=$this->request->data['Event']['TOTAL_DAY']; $i++){
                $option[$number] = date("D d F", $date);
                $date = strtotime(date("Y-m-d", $date) . " +1 day");
                $number++;
            }
            echo $this->Form->input('DAY',
                                    array(
                                            "options" => $option,
                                            "empty"=> false,
                                            "label"=>"Jour de l'intervention",
                                            'class'=>'select-day-add',
                                            "div"=>array("class" => "col-md-4")
                                    ));
            echo $this->Form->input('TIME_BEGIN', 
                                    array(
                                            "type"=>"time",
                                            "timeFormat"=>"24",
                                            "required",  
                                            "label" => "Heure de début *", 
                                            'class'=>'select-add',
                                            "div"=>array("class" => "col-md-4")
                                    ));
            echo $this->Form->input('TIME_END', 
                                    array(
                                            "type"=>"time", 
                                            "timeFormat"=>"24",
                                            "required", 
                                            "label" => "Heure de fin *", 
                                            'class'=>'select-add',
                                            "div"=>array("class" => "col-md-4")
                                    ));
?>
</div>
<div class="controls controls-row col-md-12">
        <?php
                    echo $this->Form->input('SPEAKER', 
                                            array(
                                                    "maxlength"=>"250",
                                                    "type"=>"text", 
                                                    "label" => "Intervenant(s)", 
                                                    "class" => "input-add"
                                            ));
        ?>
        </div>
        <div class="controls controls-row col-md-12">
        <?php
                    echo $this->Form->input('DESCRIPTION', 
                                            array(
                                                    "maxlength"=>"1000",
                                                    "type"=>"textarea", 
                                                    "label" => "Description", 
                                                    "class" => "form-control input-add"
                                            ));
        ?>
</div>
</div>
<?php
            echo "<div class=\"mandatory\"><h6 class=\"muted text-left col-md-6\"> * Champs obligatoire</h6></div>";
            echo $this->Form->hidden('event_id', 
                                    array(
                                        "value"=>$this->request->data['Event']['id']
                                    ));
            echo $this->Form->end(array(
                                            "type"=>"submit", 
                                            "label" => "Save",
                                            "class" => "btn btn-default col-md-6",
                                            'div' =>"test"
                                    )); 
    ?>
    	</fieldset>
    


</div>
