
<a href="index.php?page=crea">Créer</a>
    <?php 
        require 'affich_origine.php';
        require 'affich_couleur.php';
        require 'affich_moteur.php';
        require 'affich_modele.php';
        require 'affich_marque.php';
        require 'affich_auto.php';
        $test = new ModeleManager($db);
        $testa = $test->findByNom(5);

        $manager = new AutoManager($db);
        $nbVoiture = $manager->affichNb();
        echo '<h1>Nombre de voitures par marque</h1>';
        echo '<table><tr><td>Marque</td><td>Modele</td><td>Nombre</td><tr>';
        for ($i=0; $i <count($nbVoiture) ; $i++) { 
            echo '<tr><td>'.$nbVoiture[$i]['NOM_MARQUE'].'</td><td>'.$nbVoiture[$i]['NOM_MODELE'].'</td>'.
            '<td>'.$nbVoiture[$i]['nb'].'</td>';
        }
        echo '</table>';
        $muticolor = $manager->multiColor();
        $auto = new AutoManager($db);
        $idModele = $auto ->findByModele(2);
        $modele = new ModeleManager($db);
        $modele = $modele->findByNom($idModele["ID_MODELE"]);
        echo '<h1>voiture de couleur gris et violet</h1>';
        echo '<table><tr><td>plaque</td><td>Modele</td><tr>';
        for ($i=0; $i < count($muticolor); $i++) { 
            echo '<tr><td>'.$muticolor[$i]['PLAQUE'].'</td><td>'.$modele['NOM_MODELE'].'</td>';
        }
    ?>
 