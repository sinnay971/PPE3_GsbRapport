<?php
    session_start();
    require_once "../Data/pdogsbrapports.php";
    $mdp = $_REQUEST['mdp'];
    $login = $_REQUEST['login'];
    $pdo=PdoGsbRapports::getPdo();
    $visiteur = $pdo->getLeVisiteur($login,$mdp);
   // var_dump("censé affichéw slp !");
    //var_dump($visiteur['id']);
    //var_dump($visiteur);
    if($visiteur != null)
        {
        
            //$GLOBALS['login']=$login;
            //$_SESSION["infovisiteur"] = $visiteur;
            $_SESSION['visteur']['id'] =$visiteur[0];
            $_SESSION['visteur']['nom'] =$visiteur[1];
            $_SESSION['visteur']['prenom'] =$visiteur[2];
            $_SESSION['visiteur']['mdp']=$mdp;
            $_SESSION['visiteur']['login']=$login;
        }
    //var_dump($_SESSION['visteur']['id']);
    echo json_encode($visiteur);
?>