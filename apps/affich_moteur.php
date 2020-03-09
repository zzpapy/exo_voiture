<div>
    <h1 class="moteur"></h1>
    <select name="moteur" id="moteur_select">
        <option value="">Choisir moteur</option>
        <?php 
            $manager = new MoteurManager($db);
            $list_moteur = $manager->findAll();
            for ($i=0; $i < count($list_moteur); $i++) { 
                $nom= $list_moteur[$i]["TYPE_MOTEUR"];
                $id = $list_moteur[$i]["ID_MOTEUR"];
                echo '<option value="'.$id.'" id="'.$nom.'">'.$nom.'</option>';
            }
            var_dump($list_origine[$i]["NOM_ORIGINE"]);
        ?>
    </select>
</div>