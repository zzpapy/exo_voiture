<div>
    <h1 class="couleur"></h1>
    <select name="pets" id="couleur_select">
        <option value="">Choisir couleur</option>
        <?php 
            $manager = new CouleurManager($db);
            $list_couleur = $manager->findAll();
            for ($i=0; $i < count($list_couleur); $i++) { 
                $nom= $list_couleur[$i]["NOM_COULEUR"];
                $id = $list_couleur[$i]["ID_COULEUR"];
                echo '<option value="'.$nom.'" id="'.$id.'">'.$nom.'</option>';
            }
            var_dump($list_origine[$i]["NOM_ORIGINE"]);
        ?>
    </select>
</div>