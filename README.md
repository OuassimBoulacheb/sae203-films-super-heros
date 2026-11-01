# SAE203 · Films de super-héros

Site dynamique sur les films de super-héros (Marvel, DC et d'autres), réalisé en PHP avec une base de données MySQL, dans le cadre du BUT MMI à l'IUT de Troyes.

**Version en ligne :** https://sae203.mmi25f15.mmi-troyes.fr/index.php

## Ce que fait le site

- **Accueil** : présentation de l'univers des super-héros et des films les mieux notés.
- **Catalogue** (`listing.php`) : tous les films, lus dans la base de données avec leur studio, leur année, leur durée et leur note.
- **Recherche** (`form_recherche.php` et `reponse_recherche.php`) : un formulaire pour retrouver un film.
- **Administration** (`admin/`) : un tableau de bord pour ajouter, modifier et supprimer des films. Sur la version en ligne, cet espace est protégé par un mot de passe.

## Technologies

PHP (PDO), MySQL, HTML, CSS.

## Installer le projet en local

1. Crée une base de données nommée `sae203Base` et importe `sql/sae203Base.sql`.
2. Crée un utilisateur MySQL `sae203User` avec les droits sur cette base.
3. Dans les fichiers PHP qui se connectent à la base, remplace `MOT_DE_PASSE` par le mot de passe de cet utilisateur. Il est écrit directement dans chaque fichier : `listing.php`, `reponse_recherche.php`, et tous les fichiers du dossier `admin/` qui ouvrent une connexion.
4. Lance le site avec un serveur PHP, par exemple `php -S localhost:8000` depuis le dossier du projet.

## À savoir

- **Les affiches de films ne sont pas incluses** dans ce dépôt (dossier `images/`), car ce sont des images protégées par des droits d'auteur. Les pages s'affichent donc avec des images manquantes en local.
- **La protection de l'espace admin n'est pas incluse** non plus (elle est configurée sur le serveur). Si tu déploies ce projet, protège le dossier `admin/` avant de le mettre en ligne.
- Le mot de passe de la base est écrit en clair dans plusieurs fichiers : c'est une limite de ce projet de cours. Une version plus propre le mettrait dans un seul fichier de configuration, hors du dépôt.
