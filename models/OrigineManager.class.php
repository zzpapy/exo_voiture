<?php 
class OrigineManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        var_dump($data);
        $query=$this->_db->prepare( 'SELECT * 
        FROM origine 
        WHERE NOM_ORIGINE=:NOM_ORIGINE');
        $test=$query->execute($data);
        $test = $query->fetch();
        if(empty($test)){
            $query = $this->_db->prepare( 'INSERT INTO origine (NOM_ORIGINE) VALUES(:NOM_ORIGINE) ');
            $query->execute($data);     
        }
        $last_id = $this->_db->lastInsertId();
        return $last_id;
    }
    public function findAll(){
        $query=$this->_db->prepare( 'SELECT * 
        FROM origine ');
        $origines=$query->execute();
        $origines = $query->fetchALL();
        return $origines; 
        
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>