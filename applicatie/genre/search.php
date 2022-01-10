<?php
require_once '../data/db_connectie.php';
require_once '../components/components.php';
require_once '../data/verwerkSearch.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../inloggen.php?inloggen=error');
}
 if(isset($_GET['titel'])) {
   $veiligTitel = htmlspecialchars($_GET['titel']);
   $titel = '%' . $veiligTitel . '%';
   $verbinding = maakVerbinding();
   $query = $verbinding->prepare("SELECT * FROM Movie WHERE title LIKE ?");
   $query->execute([$titel]);
   $user = $query->fetchAll();
 } 
 
 if (isset($_GET['genre'])) {
     $genre = $_GET['genre'];
     $verbinding = maakVerbinding();
     $query = $verbinding->prepare("SELECT mg.movie_id, title FROM Movie_Genre mg INNER JOIN Movie m ON mg.movie_id = m.movie_id WHERE genre_name = ?");
     $query->execute([$genre]);
     $genres = $query->fetchAll();
 }

 if (!empty($_GET['titel']) && isset($_GET['genre'])) {
     $titelEnGenreInDatabase = zitTitelEnGenreInDatabase($_GET['genre'], $_GET['titel']);
     $genre = $_GET['genre'];
     $titel = '%' . $_GET['titel'] . '%';
     $verbinding = maakVerbinding();
     $query = $verbinding->prepare("SELECT mg.movie_id, title FROM Movie_Genre mg INNER JOIN Movie m ON mg.movie_id = m.movie_id WHERE genre_name = ? AND title LIKE ?");
     $query->execute([$genre, $titel]);
     $alleGegevens = $query->fetchAll();
 }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/style/normalize.css">
    <link rel="stylesheet" href="../resources/style/styles.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico">
    <title>Fletnix - Zoeken</title>
</head>
<body>
    <header>
        <?php maakHeaderIngelogd('search')?>
    </header>

    <main>
        <div class="films-container">
        <?php
        // IF-else statements nog helemaal aanpassen --> Ziet er nu heel slordig eruit
        $titelInDatabase = zitTitelInDatabase($_GET['titel']);
        if (empty($_GET['titel']) && !isset($_GET['genre'])) {
            header('Location: zoekopties.php?zoeken=empty');
        } else if (!$titelInDatabase){
            header('Location: zoekopties.php?zoeken=error');
        } else {
            if (!empty($_GET['titel']) && isset($_GET['genre'])) {
                if (!$titelEnGenreInDatabase) {
                    header('Location: zoekopties.php?zoeken=error');
                } else {
                    foreach ($alleGegevens as $gegevens) {
                        echo <<<OTD
                        <div class="film-card">
                        <a href="film.php?movieid={$gegevens['movie_id']}"><img class="film-card-img" src="../resources/images/img3.jpg" alt="{$gegevens['title']}"></a>
                        <p>{$gegevens['title']}</p>
                        </div>
                        OTD;
                    }
                }           
            } else if(!empty($_GET['titel'])) {
                foreach ($user as $gebruiker) {
                    echo <<<OTD
                    <div class="film-card">
                    <a href="film.php?movieid={$gebruiker['movie_id']}"><img class="film-card-img" src="../resources/images/img3.jpg" alt="{$gebruiker['title']}"></a>
                    <p>{$gebruiker['title']}</p>
                    </div>
                    OTD;
                }
            } else if (isset($_GET['genre'])) {
                foreach ($genres as $genre) {
                    echo <<<OTD
                    <div class="film-card">
                    <a href="film.php?movieid={$genre['movie_id']}"><img class="film-card-img" src="../resources/images/img3.jpg" alt="{$genre['title']}"></a>
                    <p>{$genre['title']}</p>
                    </div>
                    OTD; 
                }
            }
        }
        ?>
        </div>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>