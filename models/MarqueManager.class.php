<?php 
class MarqueManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT NOM_MARQUE 
        FROM marque 
        WHERE NOM_MARQUE = "'.$data["NOM_MARQUE"].'"');
        $test=$query->execute();
        $test = $query->fetchAll();
        if(!$test){
            $query = $this->_db->prepare( 'INSERT INTO marque (NOM_MARQUE,ID_ORIGINE) 
                            VALUES(:NOM_MARQUE,:ID_ORIGINE) ');
            $query->execute($data);
        }
        
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}

?>