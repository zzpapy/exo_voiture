<div>
    <h1 class="origine"></h1>
    <select name="affich_origine" id="origine_select">
        <option value="">Choisir origine</option>
        <?php 
        $manager = new OrigineManager($db);
        $list_origine = $manager->findAll();
        for ($i=0; $i < count($list_origine); $i++) { 
            $nom= $list_origine[$i]["NOM_ORIGINE"];
            $id = $list_origine[$i]["ID_ORIGINE"];
            echo '<option value="'.$id.'" id="'.$nom.'">'.$nom.'</option>';
        }
        // var_dump($list_origine);
        ?>
    </select>
</div>