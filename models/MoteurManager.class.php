<?php 
class MoteurManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT * 
                        FROM moteur 
                        WHERE TYPE_MOTEUR=:TYPE_MOTEUR');
        $test=$query->execute($data);
        $test = $query->fetch();
        if(!$test){
                $query = $this->_db->prepare( 'INSERT INTO moteur (TYPE_MOTEUR) VALUES(:TYPE_MOTEUR)');
                $query->execute($data);
        }
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>