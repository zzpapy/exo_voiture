<?php 
class VoitureCouleurManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT * 
                        FROM voiture_couleur 
                        WHERE ID_COULEUR = "'.$data["ID_COULEUR"].'"
                        AND ID_VOITURE = "'.$data["ID_VOITURE"].'"');
        $test=$query->execute($data);
        $test = $query->fetch();
        $query = $this->_db->prepare( 'INSERT INTO voiture_couleur (ID_COULEUR,ID_VOITURE) 
                                VALUES(:ID_COULEUR,:ID_VOITURE)');
        var_dump($test);
        if(!$test){
            try{
                $query->execute($data);
            }
            catch(PDOException $e){
                echo "toto";
            }        
        }            
    }
    public function findAll(){
        $query=$this->_db->prepare( 'SELECT * 
        FROM voiture_couleur ');
        $voiture_couleur=$query->execute();
        $voiture_couleur = $query->fetchALL();
        var_dump($voiture_couleur);
        return $voiture_couleur; 
        
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>