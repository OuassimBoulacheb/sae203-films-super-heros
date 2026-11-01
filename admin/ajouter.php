<?php include('../header.php'); ?>

<h2>Ajouter un film</h2>
<a href="admin.php">Retour au tableau de bord</a>
<hr>

<form method="POST" action="valid_ajout.php" enctype="multipart/form-data">
    Titre : <input type="text" name="titre"><br><br>
    Année : <input type="text" name="annee"><br><br>
    Durée (min) : <input type="text" name="duree"><br><br>
    Note : <input type="text" name="note"><br><br>
    Synopsis : <textarea name="synopsis"></textarea><br><br>
    Photo : <input type="file" name="photo"><br><br>
    Studio :
    <select name="studio_id">
        <?php
        $mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
        $mabd->query('SET NAMES utf8;');
        $req = "SELECT * FROM studios";
        $resultat = $mabd->query($req);
        foreach ($resultat as $studio) {
            echo '<option value="' . $studio['studio_id'] . '">' . $studio['studio_nom'] . '</option>';
        }
        ?>
    </select><br><br>
    <input type="submit" value="Ajouter">
</form>

<?php include('../footer.php'); ?>