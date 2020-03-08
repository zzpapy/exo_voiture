<?php
	$db = new PDO('mysql:host=localhost;dbname=voiture', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    
    $pays =["NOM_ORIGINE"=>"IT"];
    $query=$db->prepare( 'SELECT * 
    FROM origine 
    WHERE NOM_ORIGINE=:NOM_ORIGINE');
    $test=$query->execute($pays);
    $test = $query->fetch();
    if(!$test){
            $query = $db->prepare( 'INSERT INTO origine (NOM_ORIGINE) VALUES(:NOM_ORIGINE) ');
            $query->execute($pays);     
    }
    $couleurs =["NOM_COULEUR"=>"jaune"];
    $query=$db->prepare( 'SELECT * 
    FROM couleur 
    WHERE NOM_COULEUR=:NOM_COULEUR');
    $test=$query->execute($couleurs);
    $test = $query->fetch();
    if(!$test){
            $query = $db->prepare( 'INSERT INTO couleur (NOM_COULEUR) VALUES(:NOM_COULEUR)');
            $query->execute($couleurs);
        }                   
    $moteurs =["TYPE_MOTEUR"=>"SP"];
    $query=$db->prepare( 'SELECT * 
    FROM moteur 
    WHERE TYPE_MOTEUR=:TYPE_MOTEUR');
    $test=$query->execute($moteurs);
    $test = $query->fetch();
    if(!$test){
            $query = $db->prepare( 'INSERT INTO moteur (TYPE_MOTEUR) VALUES(:TYPE_MOTEUR)');
            $query->execute($moteurs);
    }
    $marques =["NOM_MARQUE"=>"FIAT","ID_ORIGINE"=>2];
        $query=$db->prepare( 'SELECT NOM_MARQUE 
        FROM marque WHERE NOM_MARQUE = "'.$marques["NOM_MARQUE"].'"');
        $test=$query->execute();
        $test = $query->fetchAll();
        // var_dump($test);
    if(!$test){
            $query = $db->prepare( 'INSERT INTO marque (NOM_MARQUE,ID_ORIGINE) 
                                    VALUES(:NOM_MARQUE,:ID_ORIGINE) ');
            $query->execute($marques);
    }
    $modeles =["NOM_MODELE"=>"PANDA","ID_MARQUE"=>4];
    $query=$db->prepare( 'SELECT * 
    FROM modele 
    WHERE NOM_MODELE = "'.$modeles["NOM_MODELE"].'"');
    $test=$query->execute($modeles);
    $test = $query->fetch();
    // var_dump($query->fetch());
    if(!$test){
            $query = $db->prepare( 'INSERT INTO modele (NOM_MODELE,ID_MARQUE) 
                                    VALUES(:NOM_MODELE,:ID_MARQUE) ');
            $query->execute($modeles);
    }
    $couleurs=["ID_COULEUR"=>2,"ID_VOITURE"=>2]; 
    $query = $db->prepare( 'INSERT INTO voiture_couleur (ID_COULEUR,ID_VOITURE) 
                                        VALUES(:ID_COULEUR,:ID_VOITURE)');
                                        
    try{
        $query->execute($couleurs);
    }
    catch(PDOException $e){
        echo "toto";
    }  
    $auto =["PLAQUE"=>"EX-336-RX","NB_PORTES"=>5,"ID_MODELE"=>5,"ID_MOTEUR"=>2];
    $query=$db->prepare( 'SELECT * 
    FROM auto WHERE PLAQUE="'.$auto["PLAQUE"].'"');
    $test=$query->execute();
    $test = $query->fetch();    
    if(!$test){
        $query = $db->prepare( 'INSERT INTO auto (PLAQUE,NB_PORTES,ID_MODELE,ID_MOTEUR) 
                                        VALUES(:PLAQUE,:NB_PORTES,:ID_MODELE,:ID_MOTEUR)');
            try{
                $query->execute($auto);
                var_dump($auto);
            }
            catch(PDOException $e){
                echo "toto";
            }
        }

?>