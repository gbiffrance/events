<div id="user">

    <h3> Administration du site </h3>

    <?php   
        foreach($listEvent as $event){
           echo "<h5>".$event["Event"]["NAME"]."</h5>";

            echo "<ul class=\"unstyled navigation\">";
                echo "<li><a href= \"/formation_septembre2015/participants/validation/".$event["Event"]["id"]."\">Confirmer les inscriptions</a></li>";
                echo "<li><a href= \"/formation_septembre2015/participants/view_admin/".$event["Event"]["id"]."\">Liste des participants</a></li>";
                echo "<li><a href= \"/formation_septembre2015/programmes/add/".$event["Event"]["id"]."\">Ajouter un élément dans l'agenda</a></li>";
                echo "<li><a href= \"/formation_septembre2015/programmes/admin_view/".$event["Event"]["id"]."\">Modifier l'agenda</a></li>";
           echo " </ul> ";
        }
    ?>



</div>
