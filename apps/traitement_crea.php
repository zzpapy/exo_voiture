<?php 
if(isset($_POST["origine"])){
    $pays =["NOM_ORIGINE"=>$_POST["origine"]];
    $manager = new OrigineManager($db);
    $manager -> add($pays);
}
if(isset($_POST["couleur"])){
    $couleurs =["NOM_COULEUR"=>$_POST["couleur"]];
    $manager = new CouleurManager($db);
    $manager -> add($couleurs);    
}
if(isset($_POST["moteur"]) &&!isset($_POST["auto"])){
    $moteurs =["TYPE_MOTEUR"=>$_POST["moteur"]];
    $manager = new MoteurManager($db);
    $manager -> add($moteurs);    
}
if(isset($_POST["affich_origine"])){
    if(!empty($_POST["affich_origine"])){
        $manager = new MarqueManager($db);
        $marques =["NOM_MARQUE"=>$_POST["marque"],"ID_ORIGINE"=>$_POST["affich_origine"]];
        $manager -> add($marques);
    }
    else{
        $manager = new OrigineManager($db);
        $pays =["NOM_ORIGINE"=>$_POST["new_origine"]];
        $id = $manager -> add($pays);
        $manager = new MarqueManager($db);
        $marques =["NOM_MARQUE"=>$_POST["marque"],"ID_ORIGINE"=>$id];
        $manager -> add($marques);
    }    
}
if(isset($_POST["modele"]) && !isset($_POST["auto"])){
    $modeles =["NOM_MODELE"=>$_POST["modele"],"ID_MARQUE"=>$_POST["marque"]];
    $manager = new ModeleManager($db);
    $manager -> add($modeles);    
}
if(isset($_POST["auto"])){
    $manager = new AutoManager($db);
    $auto =["PLAQUE"=>$_POST["auto"],"NB_PORTES"=>$_POST["nb_portes"],"ID_MODELE"=>$_POST["modele"],"ID_MOTEUR"=>$_POST["moteur"]];    
    $manager = new AutoManager($db);
    $manager -> add($auto);
}

?>