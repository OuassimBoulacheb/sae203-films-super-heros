<?php include('../header.php'); ?>

<h2>Modifier un film</h2>
<a href="admin.php">Retour au tableau de bord</a>
<hr>

<?php
$id = $_GET['num'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM films WHERE film_id = " . $id;
$resultat = $mabd->query($req);
$film = $resultat->fetch();
?>

<form method="POST" action="valid_modif.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $film['film_id']; ?>">
    Titre : <input type="text" name="titre" value="<?php echo $film['film_titre']; ?>"><br><br>
    Année : <input type="text" name="annee" value="<?php echo $film['film_annee']; ?>"><br><br>
    Durée (min) : <input type="text" name="duree" value="<?php echo $film['film_duree']; ?>"><br><br>
    Note : <input type="text" name="note" value="<?php echo $film['film_note']; ?>"><br><br>
    Synopsis : <textarea name="synopsis"><?php echo $film['film_synopsis']; ?></textarea><br><br>
    Photo : <input type="file" name="photo" value="<?php echo $film['film_photo']; ?>"><br><br>
    Studio :
    <select name="studio_id">
        <?php
        $req2 = "SELECT * FROM studios";
        $resultat2 = $mabd->query($req2);
        foreach ($resultat2 as $studio) {
            $selected = "";
            if ($film['studio_id'] == $studio['studio_id']) $selected = "selected";
            echo '<option ' . $selected . ' value="' . $studio['studio_id'] . '">' . $studio['studio_nom'] . '</option>';
        }
        ?>
    </select><br><br>
    <input type="submit" value="Modifier">
</form>

<?php include('../footer.php'); ?>