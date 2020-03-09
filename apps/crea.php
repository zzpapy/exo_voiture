<div class="crea">
    <h1>définir origine</h1>
    <div class="crea_origine">
        <form action="" method="POST">
            <input type="text" name="origine">
            <input type="submit">
        </form>
    </div>
</div>
<div class="crea">
    <h1>définir couleur</h1>
    <div class="crea_couleur">
        <form action="" method="POST">
            <input type="text" name="couleur">
            <input type="submit"></form>
    </div>
</div>
<div class="crea">
    <h1>définir moteur</h1>
    <div class="crea_moteur">
        <form action="" method="POST">
            <input type="text" name="moteur">
            <input type="submit">
        </form>
    </div>
</div>
<div class="crea">
    <h1>créer une marque</h1>
    <div class="crea_marque">
        <form action="" method="POST">
            <h2>nom de la marque</h2>
            <input type="text" name="marque">
            <h2>choisir dans la liste ou...</h2>
            <?php 
                require 'affich_origine.php';
            ?>
            <h2>créer une nouvelle origine</h2>
            <input type="text" name="new_origine" value="">
            <input type="submit">
        </form>
    </div>
</div>
<div class="crea">
    <h1>créer un modele</h1>
    <div class="crea_modele">
        <form action="" method="POST">
            <h2>nom du modele</h2>
            <input type="text" name="modele">
            <?php 
                require 'affich_marque.php';
            ?>
            <input type="submit">
        </form>
    </div>
</div>
<div class="crea">
    <h1>créer une auto</h1>
    <div class="crea_auto">
        <form action="" method="POST">
            <h2>plaque</h2>
            <input type="text" name="auto">
            <h2>choisri une motorisatio</h2>
            <?php 
                require 'affich_moteur.php';
            ?>
            <h2>choisir un modele</h2>
            <?php 
                require 'affich_modele.php';
            ?>
            <h2>nombre de portes</h2>
            <input type="text" name="nb_portes" value="">
            <input type="submit">
        </form>
    </div>
</div>