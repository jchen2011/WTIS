<?php
require_once 'components/header.php';
require_once 'components/footer.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Over ons</title>
</head>
<body>
    <header>
        <?=maakHeader('overons')?>
    </header>

    <main>
        <section class="overons-container">
            <article class="overons-content">
                <h2>Wie zijn wij?</h2>
                <p>Flexnix is een streamingdienst waar iedereen voor een goedkope prijs de films en series kunnen bekijken.</p> 
                <p>Fletnix is specifiek gericht op het doelgroep jongeren en werd opgericht in 2013, nadat bekend werd dat Netflix naar Nederland zou komen.</p>
            </article>
        </section>
        
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>