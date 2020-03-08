<?php 
class OrigineManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT * 
        FROM origine 
        WHERE NOM_ORIGINE=:NOM_ORIGINE');
        $test=$query->execute($data);
        $test = $query->fetch();
        if(!$test){
        $query = $this->_db->prepare( 'INSERT INTO origine (NOM_ORIGINE) VALUES(:NOM_ORIGINE) ');
        $query->execute($data);     
        }
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>