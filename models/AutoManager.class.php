<?php 
class AutoManager{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
      $this->setDb($db);
    }
    
    public function add($data)
    {   
        $query=$this->_db->prepare( 'SELECT * 
        FROM auto WHERE PLAQUE="'.$data["PLAQUE"].'"');
        $test=$query->execute();
        $test = $query->fetch();    
        if(!$test){
        $query = $this->_db->prepare( 'INSERT INTO auto (PLAQUE,NB_PORTES,ID_MODELE,ID_MOTEUR) 
                                        VALUES(:PLAQUE,:NB_PORTES,:ID_MODELE,:ID_MOTEUR)');
            try{
                $query->execute($data);
            }
            catch(PDOException $e){
                echo "toto";
            }
        }
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    public function affich($pays){
        $query=$this->_db->prepare( 'SELECT PLAQUE,NOM_MODELE,NOM_MARQUE,NOM_ORIGINE 
        FROM auto a, modele m, marque mq,origine o
        WHERE a.ID_MODELE = m.ID_MODELE
        AND m.ID_MARQUE = mq.ID_MARQUE
        AND mq.ID_ORIGINE = o.ID_ORIGINE
        AND o.NOM_ORIGINE = "'.$pays.'"');
        $test=$query->execute();
        $test = $query->fetchAll();  
        return $test; 
    }
    public function affichNb(){
        $query =$this->_db->prepare('SELECT m.ID_MODELE, a.ID_MODELE, mq.NOM_MARQUE, COUNT(a.ID_MODELE) AS nb
        FROM  modele m, auto a, marque mq
        WHERE m.ID_MODELE = a.ID_MODELE
        AND mq.ID_MARQUE = m.ID_MARQUE
        GROUP BY m.ID_MODELE');
         $test=$query->execute();
         $test = $query->fetchAll();  
         return $test; 
    }
    
}
?>