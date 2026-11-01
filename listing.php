<?php include('header.php'); ?>

<h2 style="margin-bottom: 20px;">Catalogue des films</h2>

<div class="films">

<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');
$req = "SELECT films.*, studios.studio_nom FROM films LEFT JOIN studios ON films.studio_id = studios.studio_id";
$resultat = $mabd->query($req);

foreach ($resultat as $film) {
    echo '<div class="film">';
    if (file_exists("images/uploads/" . $film['film_photo'])) {
        echo '<img src="images/uploads/' . $film['film_photo'] . '" alt="' . $film['film_titre'] . '">';
    } else {
        echo '<img src="images/' . $film['film_photo'] . '" alt="' . $film['film_titre'] . '">';
    }
    echo '<div class="film-info">';
    echo '<h3>' . $film['film_titre'] . '</h3>';
    echo '<p>' . $film['film_annee'] . ' · ' . $film['studio_nom'] . '</p>';
    echo '<p>' . $film['film_duree'] . ' min</p>';
    echo '<p class="note">★ ' . $film['film_note'] . '/10</p>';
    echo '</div>';
    echo '</div>'; 
}
?>

</div>

<?php include('footer.php'); ?>