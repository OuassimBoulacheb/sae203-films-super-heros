<?php include('../header.php'); ?>

<a href="admin.php">Retour au tableau de bord</a>
<hr>

<?php
$id = $_POST['id'];
$titre = $_POST['titre'];
$annee = $_POST['annee'];
$duree = $_POST['duree'];
$note = $_POST['note'];
$synopsis = $_POST['synopsis'];
$studio_id = $_POST['studio_id'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');

if (!empty($_FILES['photo']['name'])) {
    $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/" . $nouvelleImage);
    $photo = $nouvelleImage;
} else {
    $req0 = "SELECT film_photo FROM films WHERE film_id = " . $id;
    $res = $mabd->query($req0);
    $film = $res->fetch();
    $photo = $film['film_photo'];
}

$req = "UPDATE films SET 
    film_titre = '$titre',
    film_annee = '$annee',
    film_duree = '$duree',
    film_note = '$note',
    film_synopsis = '$synopsis',
    film_photo = '$photo',
    studio_id = '$studio_id'
    WHERE film_id = $id";

$mabd->query($req);

echo '<h2>Le film "' . $titre . '" a bien été modifié !</h2>';
?>

<?php include('../footer.php'); ?>