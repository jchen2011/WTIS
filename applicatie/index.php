<?php
require_once 'components/components.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Home</title>
</head>
<body>
    <header>
        <?=maakHeader('logo')?>
    </header>

    <main>
        <section class="call-to-action-container">
            <h2>Onbeperkt films, series en meer kijken.</h2>
            <p>Probeer Premium 30 dagen gratis. Daarna slechts €11.99 per maand.</p>
            <a class="call-to-action-btn" href="registratieformulier.php">Neem een gratis proefabonnement</a>
        </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>