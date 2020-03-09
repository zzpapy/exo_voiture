<div>
    <h1 class="modele"></h1>
    <select name="modele" id="modele_select">
        <option value="">Choisir modele</option>
        <?php 
            $manager = new ModeleManager($db);
            $list_modele = $manager->findAll();
            for ($i=0; $i < count($list_modele); $i++) { 
                $nom= $list_modele[$i]["NOM_MODELE"];
                $id = $list_modele[$i]["ID_MODELE"]; 
                $id_origine = $list_marque[$i]["ID_MARQUE"];
                echo '<option value="'.$id.'" id="'.$nom.'">'.$nom.'</option>';
            }
        ?>
    </select>
</div>