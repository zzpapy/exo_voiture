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
        if(empty($test)){
            $query = $this->_db->prepare( 'INSERT INTO modele (NOM_MODELE,ID_MARQUE) 
                                VALUES(:NOM_MODELE,:ID_MARQUE) ');
            $query->execute($data);
        }
    }
    public function findAll(){
        $query=$this->_db->prepare( 'SELECT * 
        FROM modele ');
        $modele=$query->execute();
        $modele = $query->fetchALL();
        var_dump($modele);
        return $modele; 
        
    }
    public function findByNom($id){
        $query = $this->_db->prepare('SELECT NOM_MODELE FROM modele WHERE ID_MODELE='.$id);
        $query->execute();
        $nom = $query->fetch();
        return $nom;
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
?>