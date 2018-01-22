/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Rapport medecin, gestion du Control Panel */
/* global optionsHash */

$(function()
{
    $('#pageChoisirRapportaModifier').change(function(){
        //e.preventDefault();
        alert("Coucou");
        var date=$("#pageChoisirRapportaModifier #date").val();
        var legende="Visites effectuées le :"+date+" chez les médecins:";
        $("#pageChoisirRapportaModifier #lgddate").html(legende);
        $.post("./Ajax/traiterlesvisitesaunedate.php",
        {
            "date" : date
        },
        foncRetourListeRapports,"json"); 
      });
    // Page Connexion 
    $('#pageConnexion #btnconnexion').bind("click",maFonction);
    function maFonction(e)
    {
        e.preventDefault();
        var mdp = $("#pageConnexion #mdp").val();
        var login = $("#pageConnexion #login").val();
        $.post("./Ajax/traiterconnexion.php",
        {
            "mdp" : mdp,
            "login" :login
        },
        foncRetourConnexion,"json"); 
    }
    
    function foncRetourConnexion(data)
    {
        /*if(data != false)
        {
            $.mobile.changePage("#pageaccueil");
        }
        else
        {
            $("#pageConnexion #message").css({color:'red'});
            $("#pageConnexion #message").html("Erreur de login et/ou de mdp");
        }*/
        if (data==false)
        {
            $("#pageConnexion #message").css({color:'red'});
            $("#pageConnexion #message").html("Erreur de login et/ou de mdp");
        }
        else
        {
            $.mobile.changePage("./Vues/pageRapportVisite.php");
            //$.mobile.changePage("#pageRapportVisite");
        } 
    }
    
    
    
      
    function foncRetourListeRapports(lesVisites){
        if (lesVisites==false)
        {
            $("#pageChoisirRapportaModifier #lgddate").css({color:'red'});
            $("#pageChoisirRapportaModifier #lgddate").html("Erreur de login pd et/ou de mdp");
        }
    $('#pageChoisirRapportaModifier #listerapports').empty();
    //faire une boucle for sur le nombre de rapports
    
    for(i=0;i<lesVisites.length;i++){
        //récupérer le rapport courant
        var unRapport=lesVisites[i];
        //récupérer chaque champ
        var idRapport=unRapport['idRapport'];//cf requete
        var nomMedecin=unRapport['nomMedecin'];
        var prenomMedecin=unRapport['prenomMedecin'];
        
        var html="<li id="+idRapport+"><a href= '#'>";
        html+=nomMedecin+" "+prenomMedecin+"</a></li>";
        $('#pageChoisirRapportaModifier #listerapports').append(html); 
        
        
    }
     $('#pageChoisirRapportaModifier #listerapports').listeview('refresh');
}
});



