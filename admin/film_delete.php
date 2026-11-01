<?php include('../header.php'); ?>

<h2>Suppression d'un film</h2>
<a href="admin.php">Retour au tableau de bord</a>
<hr>

<?php
$id = $_GET['num'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');

$req = 'DELETE FROM films WHERE film_id = ' . $id;
echo $req;
$resultat = $mabd->query($req);

echo '<h3>Le film numéro ' . $id . ' a bien été supprimé !</h3>';
?>

<?php include('../footer.php'); ?>