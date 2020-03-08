<?php 
class ModeleManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {  
        $query=$this->_db->prepare( 'SELECT * 
        FROM modele 
        WHERE NOM_MODELE = "'.$data["NOM_MODELE"].'"');
        $test=$query->execute($data);
        $test = $query->fetch();
        if(!$test){
            $query = $this->_db->prepare( 'INSERT INTO modele (NOM_MODELE,ID_MARQUE) 
                                VALUES(:NOM_MODELE,:ID_MARQUE) ');
            $query->execute($data);
        }
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>