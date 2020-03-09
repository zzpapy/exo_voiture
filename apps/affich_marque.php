 <div>
    <h1 class="marque"></h1>
    <select name="marque" id="marque_select">
        <option value="">Choisir marque</option>
        <?php 
            $manager = new MarqueManager($db);
            $list_marque = $manager->findAll();
            for ($i=0; $i < count($list_marque); $i++) { 
                $nom= $list_marque[$i]["NOM_MARQUE"];
                $id = $list_marque[$i]["ID_MARQUE"];
                $id_origine = $list_marque[$i]["ID_ORIGINE"];
                echo '<option value="'.$id.'" id="'.$nom.'">'.$nom.'</option>';
            }
        ?>
    </select>
</div>