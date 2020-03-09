<div>
    <h1 class="auto"></h1>
    <select name="pets" id="auto_select">
        <option value="">Choisir auto</option>
        <?php 
            $manager = new AutoManager($db);
            $list_auto = $manager->findAll();
            for ($i=0; $i < count($list_auto); $i++) { 
                $nom= $list_auto[$i]["PLAQUE"];
                $id = $list_auto[$i]["ID_VOITURE"]; 
                $id_modele = $list_auto[$i]["ID_MODELE"];
                $id_moteur = $list_auto[$i]["ID_MOTEUR"];
                echo '<option value="'.$nom.'" id="'.$id.'">'.$nom.'</option>';
            }
        ?>
    </select>
</div>
</body>
</html>