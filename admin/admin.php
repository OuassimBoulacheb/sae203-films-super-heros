<?php 
include('../header.php');
?>

<h2>Tableau de bord - Gestion des films</h2>
<a href="ajouter.php">+ Ajouter un film</a>
<hr>

<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');
$req = "SELECT films.*, studios.studio_nom FROM films LEFT JOIN studios ON films.studio_id = studios.studio_id";
$resultat = $mabd->query($req);

echo '<table border="1">';
echo '<tr><th>Titre</th><th>Année</th><th>Studio</th><th>Note</th><th>Actions</th></tr>';

foreach ($resultat as $film) {
    echo '<tr>';
    echo '<td>' . $film['film_titre'] . '</td>';
    echo '<td>' . $film['film_annee'] . '</td>';
    echo '<td>' . $film['studio_nom'] . '</td>';
    echo '<td>' . $film['film_note'] . '</td>';
    echo '<td>';
    echo '<a href="film_modifier.php?num=' . $film['film_id'] . '">Modifier</a> | ';
    echo '<a href="film_delete.php?num=' . $film['film_id'] . '">Supprimer</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
?>

<?php include('../footer.php'); ?>