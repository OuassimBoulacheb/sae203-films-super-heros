<?php include('../header.php'); ?>

<h2>Film ajouté !</h2>
<a href="admin.php">Retour au tableau de bord</a>
<hr>

<?php
$titre = $_POST['titre'];
$annee = $_POST['annee'];
$duree = $_POST['duree'];
$note = $_POST['note'];
$synopsis = $_POST['synopsis'];
$studio_id = $_POST['studio_id'];

$imageType = $_FILES["photo"]["type"];
if (($imageType != "image/png") && ($imageType != "image/jpg") && ($imageType != "image/jpeg")) {
    echo '<p>Format non reconnu ! Seuls PNG et JPEG sont autorisés.</p>';
    die();
}

$nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/" . $nouvelleImage)) {
        echo '<p>Problème avec la sauvegarde de l\'image...</p>';
        die();
    }
} else {
    echo '<p>Problème : image non chargée...</p>';
    die();
}

$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');

$req = 'INSERT INTO films(film_titre, film_annee, film_duree, film_note, film_synopsis, film_photo, studio_id) VALUES("' . $titre . '", ' . $annee . ', ' . $duree . ', ' . $note . ', "' . $synopsis . '", "' . $nouvelleImage . '", ' . $studio_id . ')';
$mabd->query($req);

echo '<h3>Le film "' . $titre . '" a bien été ajouté !</h3>';
?>

<?php include('../footer.php'); ?>