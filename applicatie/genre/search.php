<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../data/verwerkSearch.php';
require_once '../components/toonFilm.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../inloggen.php?inloggen=error');
}
 if(isset($_GET['titel'])) {
   $veiligTitel = $_GET['titel'];
   $titel = zitTitelInDatabase($veiligTitel);
 } 
 
 if (isset($_GET['genre'])) {
     $genre = $_GET['genre'];
     $genres = zitGenreInDatabase($genre);
 }

 if (!empty($_GET['titel']) && isset($_GET['genre'])) {
     $genre = $_GET['genre'];
     $titel = $_GET['titel'];
     $titelEnGenreInDatabase = zitTitelEnGenreInDatabase($genre, $titel);
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
        // $titelInDatabase = zitTitelInDatabase($_GET['titel']);
        // if (!empty($_GET['titel']) && isset($_GET['genre'])) {
        //     toonFilms($titelEnGenreInDatabase);
        // } else if (!empty($_GET['titel'])) {
        //     toonFilms($titel);
        // } else if (isset($_GET['genre'])) {
        //     toonFilms($genres);
        // } else  {
        //     header('Location: zoekopties.php?zoeken=empty');
        // }

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
                    toonFilms($titelEnGenreInDatabase);
                }           
            } else if(!empty($_GET['titel'])) {
                toonFilms($titel);
            } else if (isset($_GET['genre'])) {
                toonFilms($genres);
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