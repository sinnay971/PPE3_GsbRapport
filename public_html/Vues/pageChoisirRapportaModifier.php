<?php
    include "entetehtml.html";
    include "enteteModifRapp.html";
    session_start();
?>
<div data-role = "page" id="pageChoisirRapportaModifier">
    <div data-role ="content">
        <p><strong>Choisir un rapport</strong></p>
        Date de la visite :
        <?php
            require_once "../Data/pdogsbrapports.php";
            ?>
            <?php
            // Utilisation de la fonction
            //$pdo=PdoGsbRapports::getPdo();
            /*$idCli=$_SESSION['visteur']['id'];
            $donnees = $pdo->getDateVisiteur($idCli);*/
            ?>
        <!-- <select name="select" id="select"> -->
            <?php
            /*foreach ($donnees as $item)
            {
                $idRapport=$item["id"];
                $date = $item["date"];
                $motif = $item["motif"];    
                /*$item=$lesDates["mois"]." ".$lesDates["motif"];
                $date=$item['date'];
                $motif=$item['motif'];*/
                ?>
                <!--<option id="date" value="<?php //$idRapport; ?>"><?php //echo $date." ".$motif;?> </option>-->
            <?php
            //}
            ?>
        <!--</select>-->
        <input type="date" name="date" id="date" value="" class="required"/>
        <label id="lgddate" for="lgddate"></label>
        <ul data-role="listview" id="listerapports">
            
        </ul>
    </div>
    <?php
        include "piedpage.html";
    ?>
</div>
<?php
    include "piedhtml.html";
?>
    