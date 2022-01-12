<?php
require_once 'data/verwerkFilm.php';
require_once 'components/header.php';
require_once 'components/footer.php';

$onlangsToegevoegd = haal4RecenteFilmsOp();
$action = haal4FilmsUitGenre('action');
$romance = haal4FilmsUitGenre('romance');
$adventure = haal4FilmsUitGenre('adventure');

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Filmoverzicht</title>
</head>
<body>
    <header>
        <?=maakHeader('filmoverzicht')?>
    </header>

    <main>
        <!-- Bron: https://www.netflix.com/nl-en/-->
        <section class="film-section">
            <h2 class="film-header">Onlangs toegevoegd</h2>
        <div class="film-container">
            <?php
                foreach($onlangsToegevoegd as $films) {
                    echo <<<OTD
                    <div class="film-card">
                    <img class="film-card-img" src="../resources/images/img3.jpg" alt="{$films['title']}">
                    <p>{$films['title']}</p>
                    </div>
                    OTD;
                }
            ?>
        </div>
        </section>
        <section class="film-section">
            <h2 class="film-header">Action</h2>
            <div class="film-container">
                <?php
                    foreach($action as $films) {
                        echo <<<OTD
                        <div class="film-card">
                        <img class="film-card-img" src="../resources/images/img3.jpg" alt="{$films['title']}">
                        <p>{$films['title']}</p>
                        </div>
                        OTD;
                    }
                ?>
            </div>
        </section>
        <section class="film-section">
            <h2 class="film-header">Romance</h2>
            <div class="film-container">
                <?php
                    foreach($romance as $films) {
                        echo <<<OTD
                        <div class="film-card">
                        <img class="film-card-img" src="../resources/images/img3.jpg" alt="{$films['title']}">
                        <p>{$films['title']}</p>
                        </div>
                        OTD;
                    }
                ?>
            </div>
        </section>
        <section class="film-section">
            <h2 class="film-header">Adventure</h2>
            <div class="film-container">
                <?php
                    foreach($adventure as $films) {
                        echo <<<OTD
                        <div class="film-card">
                        <img class="film-card-img" src="../resources/images/img3.jpg" alt="{$films['title']}">
                        <p>{$films['title']}</p>
                        </div>
                        OTD;
                    }
                ?>
            </div>
        </section>
    
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>