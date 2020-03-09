<?php 
class CouleurManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT * 
        FROM couleur 
        WHERE NOM_COULEUR=:NOM_COULEUR');
        $test=$query->execute($data);
        $test = $query->fetch();

        if(!$test){
            $query = $this->_db->prepare( 'INSERT INTO couleur (NOM_COULEUR) 
            VALUES(:NOM_COULEUR)');
            $query->execute($data);
        }
        
    }
    public function findAll(){
        $query=$this->_db->prepare( 'SELECT * 
        FROM couleur ');
        $couleurs=$query->execute();
        $couleurs = $query->fetchALL();
        var_dump($couleurs);
        return $couleurs; 
        
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}

?>