<?php
require_once 'components/header.php';
require_once 'components/footer.php';
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Inloggen</title>
</head>
<body>
    <header>
        <?=maakHeader('inloggen')?>
    </header>
    <main>
        <section class="container">
            <form method="post" action="log_in.php">
                <h2>Inloggen</h2>
                <?php
                if (isset($_GET['inloggen'])) {
                    $foutmelding = $_GET['inloggen'];
                    switch ($foutmelding) {
                        case 'error':
                            echo '<p class="foutmelding">U moet eerst inloggen</p>';
                            break;
                        case 'login':
                            echo '<p class="foutmelding">Uw gebruikersnaam en/of wachtwoord komen niet overeen</p>';
                            break;
                        case 'empty':
                            echo '<p class="foutmelding">Niet alle velden zijn ingevuld</p>';
                            break;
                        default:
                            break;
                    }
                }
                ?>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" name="wachtwoord" id="wachtwoord" pattern=".{8,}" title="Een wachtwoord bestaat uit minimaal 8 letters of cijfers" required>
                </div>
                <div>
                    <button type="submit" class="btn">Login</button>
                </div>
                <p>Heb je nog geen account? <a href="registratieformulier.php">Meld je aan</a></p>
            </form>
        </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>
