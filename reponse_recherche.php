<?php 
session_start();
include('header.php'); 
?>
<?php
$texte = "";
if (!empty($_GET['texte'])) {
    $texte = filter_var($_GET['texte'], FILTER_SANITIZE_SPECIAL_CHARS);
    $texte = htmlentities($texte);
} else {
    $_SESSION['erreur'] = "Veuillez saisir un titre de film.";
    header('Location: form_recherche.php');
    exit;
}

$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'MOT_DE_PASSE');
$mabd->query('SET NAMES utf8;');
$req = 'SELECT films.*, studios.studio_nom FROM films LEFT JOIN studios ON films.studio_id = studios.studio_id WHERE film_titre LIKE "%' . $texte . '%"';
$resultat = $mabd->query($req);
?>

<h2>Résultats de la recherche</h2>
<p>Voici les films dont le titre contient : <strong><?php echo $texte; ?></strong></p>
<br>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Année</th>
        <th>Studio</th>
        <th>Durée</th>
        <th>Note</th>
    </tr>
    <?php foreach ($resultat as $film) { ?>
    <tr>
        <td><?php echo $film['film_titre']; ?></td>
        <td><?php echo $film['film_annee']; ?></td>
        <td><?php echo $film['studio_nom']; ?></td>
        <td><?php echo $film['film_duree']; ?> min</td>
        <td><?php echo $film['film_note']; ?>/10</td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="form_recherche.php">Nouvelle recherche</a>

<?php include('footer.php'); ?>