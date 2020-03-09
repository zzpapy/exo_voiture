<?php
$db = new PDO('mysql:host=localhost;dbname=voiture', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 

function chargerClasse($classe)
{
	require 'models/' .$classe .'.class.php'; // On inclut la classe correspondante au paramètre passé.
}
spl_autoload_register('chargerClasse');
$page ="home";
$access = ["home","crea"];
$accessUser = [];
$accessAdmin = [];
if(isset($_SESSION["admin"]) && $_SESSION['admin'] == 1)
{
    if(isset($_GET["page"]) && in_array($_GET["page"], $accessAdmin))
    {
        $page = $_GET["page"];
    }
    else{
        $page='accueil';
    }
}	
else if(isset($_SESSION['user']))
{
    if(isset($_GET["page"]) && in_array($_GET["page"], $accessUser))
    {
        $page = $_GET["page"];
    }
}
else
{
    if(isset($_GET["page"]) && in_array($_GET["page"], $access))
    {
        $page = $_GET["page"];
    } 
}
$traitementList = ["crea"=>"crea"];


if(isset($traitementList[$page]))
{
    require("apps/traitement_".$traitementList[$page].".php");
}
require'apps/skel.php'; 
	
    // $pays =["NOM_ORIGINE"=>"IT"];
    // $manager = new OrigineManager($db);
    // $manager -> add($pays);

    // $couleurs =["NOM_COULEUR"=>"rouge"];
    // $manager = new CouleurManager($db);
    // $manager -> add($couleurs);

    // $moteurs =["TYPE_MOTEUR"=>"DIESEL"];
    // $manager = new MoteurManager($db);
    // $manager -> add($moteurs);

    // $marques =["NOM_MARQUE"=>"peugeot","ID_ORIGINE"=>1];
    // $manager = new MarqueManager($db);
    // $manager -> add($marques);

    // $modeles =["NOM_MODELE"=>"208","ID_MARQUE"=>16];   
    // $manager = new ModeleManager($db);
    // $manager -> add($modeles);

    
    $auto =["PLAQUE"=>"EX-337-RX","NB_PORTES"=>5,"ID_MODELE"=>14,"ID_MOTEUR"=>1];    
    $manager = new AutoManager($db);
    $manager -> add($auto);
    
    $couleurs=["ID_COULEUR"=>2,"ID_VOITURE"=>13];     
    $manager = new VoitureCouleurManager($db);
    $manager -> add($couleurs);
?>