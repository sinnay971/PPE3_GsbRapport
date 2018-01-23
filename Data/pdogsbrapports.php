<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application Gsb Rapport Mobile
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsbRapports qui contiendra l'unique instance de la classe
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsbRapports{   		
      	 /*--------------------Version locale---------------------------------------- */
      private static $serveur='mysql:host=localhost';
      private static $bdd='dbname=gsbrapports';   		
      private static $user='root' ;    		
      private static $mdp='' ;
      private static $monPdo;
      private static $monPdoGsbRapports = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
            self::$monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
            self::$monPdo->query("SET CHARACTER SET utf8");
	}
        
	public function _destruct(){
            self::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsbRapports = PdoGsbRapports::getPdo();
 
 * @return l'unique objet de la classe PdoGsbRapports
 */
	public  static function getPdo(){
		if(self::$monPdoGsbRapports == null){
			self::$monPdoGsbRapports = new PdoGsbRapports();
		}
		return self::$monPdoGsbRapports;  
	}
        
        
        public function getLeVisiteur($login,$mdp)
        {
            $req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom from visiteur 
            where login='$login' and mdp='$mdp'";
            $rs = self::$monPdo->query($req);
            $ligne = $rs->fetch();
            return $ligne;
        }
        
        /*public function getPLS($login,$mdp)
        {
            $req = "select visiteur.id as id from visiteur 
            where login='$login' and mdp='$mdp'";
            $rs = self::$monPdo->query($req);
            $ligne = $rs->fetch();
            return $ligne;
        }*/
        /*
        public function Decode($data){
            $items = array();
            $date = array();
            $motif = array();
            foreach ($data as $key => $value) {
             //$items[] = "Clé : $key; Valeur : $value ";
             if($key == "date"){
                 $date[] = $value;
             }else{
                 $motif[] = $value;
             }
            }
            for($i=0;$i<count($date);$i++){
             $String = $date[$i]." $motif[$i] ";
             $items[] = $String;
            }
            return $items;
        }*/
        
        public function getDateVisiteur($id)
        {
            $req = "SELECT id,date, motif FROM rapport WHERE idVisiteur='$id'";
            $rs = self::$monPdo->query($req);
            $ligne = $rs->fetchAll();
            return $ligne;
        }

        
        
       public function getLesVisitesUneDate($login,$mdp,$date)
       {
           $req="select rapport.id as idRapport, medecin.nom as nomMedecin, medecin prenom as prenomMedecin from visiteur,rapport, medecin where visiteur.login=:login and visiteur.mdp=:mdp and rapport.idVisiteur=visiteur.id and medecin.id=rapport.idMedecin and rapport.date=:date";
            $stm=self::$monPdo->prepare($req);
            $stm->bindParam(':login',$login);
            $stm->bindParam(':mdp',$mdp);
            $stm->bindParam(':date',$date);
            
            $stm->execute();
            
            $lesLignes=$stm->fetchall();
            return $lesLignes;   
       }
               
        
}   // fin classe
?>


