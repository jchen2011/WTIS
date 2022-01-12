<?php
require_once '../components/header.php';
require_once '../components/footer.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../inloggen.php?inloggen=error');
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
    <title>Fletnix - Trailer</title>
</head>
<body>
    <header>
        <?php maakHeaderIngelogd('trailer')?>
    </header>
    <main>
        <!-- Bron: https://www.youtube.com/watch?v=YUH1mfV3IEU&ab_channel=CineStream -->
        <video controls>
            <source src="onepunchman.mp4" type="video/mp4">
            Je browser ondersteunt deze video bestand niet
        </video>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>