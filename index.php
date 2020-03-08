<?php
	$db = new PDO('mysql:host=localhost;dbname=voiture', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    
    $pays =["'italie'"];
    foreach ($pays as $key => $value) {
        $query=$db->prepare( 'SELECT * 
        FROM origine 
        WHERE NOM_ORIGINE='.$value.'');
        $test=$query->execute($pays);
        $test = $query->fetch();
        if(!$test){
            foreach ($pays as $key ) {
                $query = $db->prepare( 'INSERT INTO origine (NOM_ORIGINE) VALUES('.$key.') ');
                $query->execute();
            }                             
        }
    }
    $couleurs =["'noir'","'blanc'"];
    foreach ($couleurs as $key => $value) {
        $query=$db->prepare( 'SELECT * 
        FROM couleur 
        WHERE NOM_COULEUR='.$value.'');
        $test=$query->execute($couleurs);
        $test = $query->fetch();
        if(!$test){
            foreach ($couleurs as $key ) {
                $query = $db->prepare( 'INSERT INTO couleur (NOM_COULEUR) VALUES('.$key.')');
                $query->execute();
            }                   
        }
    }
    $moteurs =["'diesel'","'SP'"];
    foreach ($moteurs as $key => $value) {
        $query=$db->prepare( 'SELECT * 
        FROM moteur 
        WHERE TYPE_MOTEUR='.$value.'');
        $test=$query->execute($moteurs);
        $test = $query->fetch();
        if(!$test){
            foreach ($moteurs as $key ) {
                $query = $db->prepare( 'INSERT INTO moteur (TYPE_MOTEUR) VALUES('.$key.')');
                $query->execute();
            }                   
        }
    }

    $marques =["NOM_MARQUE"=>"'fiat'","ID_ORIGINE"=>1];
    foreach ($marques as $key => $value) {
        $query=$db->prepare( 'SELECT * 
        FROM marque 
        WHERE NOM_MARQUE='.$value.'');
        $test=$query->execute($marques);
        $test = $query->fetch();
    }
    var_dump($marques);
            if(!$test){
                // foreach ($marques as $key ) {
                    $query = $db->prepare( 'INSERT INTO marque (NOM_MARQUE,ID_ORIGINE) 
                    VALUES(:NOM_MARQUE,:ID_ORIGINE) ');
                    $query->execute($marques);
                // }           
            }
    $modeles =["NOM_MODELE"=>"'panda'","ID_MARQUE"=>1];
    foreach ($modeles as $key => $value) {
        $query=$db->prepare( 'SELECT * 
        FROM modele 
        WHERE NOM_MODELE='.$value.'');
        $test=$query->execute($modeles);
        $test = $query->fetch();
        // var_dump($query->fetch());
        if(!$test){
            // foreach ($modeles as $key ) {
                $query = $db->prepare( 'INSERT INTO modele (NOM_MODELE,ID_MARQUE) VALUES(:NOM_MODELE,:ID_MARQUE) ');
                $query->execute($modeles);
            // }
        }
    }
    $auto =["PLAQUE"=>"EX-444-RX","NB_PORTES"=>5,"ID_MODELE"=>7,"ID_MOTEUR"=>1,"ID_COULEUR"=>1];
    
        $query=$db->prepare( 'SELECT * 
        FROM auto WHERE PLAQUE="'.$auto["PLAQUE"].'"');
        $test=$query->execute();
        $test = $query->fetch();
        
        
        
        if(!$test){
            $query = $db->prepare( 'INSERT INTO auto (PLAQUE,NB_PORTES,ID_MODELE,ID_MOTEUR,ID_COULEUR) 
                                            VALUES(:PLAQUE,:NB_PORTES,:ID_MODELE,:ID_MOTEUR,:ID_COULEUR)');
                try{
                    $query->execute($auto);
                    var_dump($auto);
                }
                catch(PDOException $e){
                    echo "toto";
                }
            }

?>