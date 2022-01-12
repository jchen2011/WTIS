<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../data/verwerkSearch.php';

session_start(); 

if (!isset($_SESSION['user'])) {
    header('Location: ../inloggen.php?inloggen=error');
}

$alleGenre = haalGenresOp();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/style/normalize.css">
    <link rel="stylesheet" href="../resources/style/styles.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico">
    <title>Fletnix - Zoekopties</title>
</head>
<body>
    <header>
    <?php maakHeaderIngelogd('zoekopties')?>
    </header>
    <main>
        <h1 class="registreer">Zoek naar een film of serie</h1>
        <section class="container">
            <form method="get" action="search.php">
                <?php
                    if(isset($_GET['zoeken'])) {
                        $foutmelding = $_GET['zoeken'];
                        switch ($foutmelding) {
                            case 'empty':
                                echo '<p class="foutmelding">Geen veld is ingevuld</p>';
                                break;
                            case 'error':
                                echo '<p class="foutmelding">Film niet gevonden</p>';
                                break;
                            default:
                                break;
                        }
                    }
                ?>
                <div>
                    <label for="titel">Film titel</label>
                    <input type="text" name="titel" id="titel" placeholder="Film titel">
                </div>
                <div>
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        <option value="niet-gekozen" selected disabled>Selecteer een genre</option>
                        <?php
                        foreach($alleGenre as $genre) {
                            echo '<option value="' . $genre['genre_name'] . '">' . $genre['genre_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn">Zoeken</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>