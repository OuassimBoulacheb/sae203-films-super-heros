<?php 
session_start();
include('header.php'); 
?>

<div class="search-container">
    <h2>Rechercher un film</h2>
    <p>Entrez le titre d'un film pour le retrouver dans le catalogue.</p>

    <?php
        if (isset($_SESSION['erreur'])) {
            echo '<p class="erreur">' . $_SESSION['erreur'] . '</p>';
            unset($_SESSION['erreur']);
        }
    ?>

    <form action="reponse_recherche.php" method="get">
        <label for="texte">Titre du film :</label>
        <div class="search-bar">
            <input type="text" id="texte" name="texte" placeholder="Ex: Spider-Man, Batman, Avengers...">
            <input type="submit" value="Rechercher">
        </div>
    </form>
</div>

<?php include('footer.php'); ?>
