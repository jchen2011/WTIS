<?php
require_once 'components/header.php';
require_once 'components/footer.php';
require_once 'data/landen.php';
$landen = haalAlleLandenOp();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Registreren</title>
</head>
<body>
    <header>
        <?=maakHeader('registreren')?>
    </header>

    <main>
        <h1 class="registreer">Wat leuk dat je kiest voor Fletnix</h1>
        <section class="container">
            <form method="post" action="registreren.php">
                <?php
                if (isset($_GET['registreren'])) {
                    $foutmelding = $_GET['registreren'];
                    switch ($foutmelding) {
                        case 'empty':
                            echo '<p class="foutmelding">Niet alle velden zijn ingevuld</p>';
                            break;
                        case 'email':
                            echo '<p class="foutmelding">Voer ur e-mailadres in het formaat: jenaam@voorbeeld.nl</p>';
                            break;
                        case 'voornaam':
                            echo '<p class="foutmelding">De voornaam kan alleen letters, streepjes, apostrofs en spaties bevatten</p>';
                            break;
                        case 'achternaam':
                            echo '<p class="foutmelding">De achternaam kan alleen letters, streepjes, apostrofs en spaties bevatten</p>';
                            break;
                        case 'land':
                            echo '<p class="foutmelding">Landen moet in het engels ingevuld worden</p>';
                            break;
                        case 'wachtwoord':
                            echo '<p class="foutmelding">Het wachtwoord komt niet overeen</p>';
                            break;
                        case 'rekeningnummer':
                            echo '<p class="foutmelding">Een rekeningnummer bestaat uit 2 letters, 2 cijfers, 4 letters en vervolgens nog 10 cijfers</p>';
                            break;
                        case 'submit':
                            echo '<p class="foutmelding">U moet zich hier gaan registreren</p>';
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
                    <label for="wachtwoord_check">Herhaal wachtwoord</label>
                    <input type="password" name="wachtwoord_check" id="wachtwoord_check" pattern=".{8,}" title="Een wachtwoord bestaat uit minimaal 8 letters of cijfers" required>
                </div>
                <div>
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" id="voornaam" required>
                </div>
                <div>
                    <label for="achternaam">Achternaam</label>
                    <input type="text" name="achternaam" id="achternaam" required>
                </div>
                <div>
                    <label for="land">Land</label>
                    <select name="land" id="abonnement" required>
                        <?php
                            foreach($landen as $land) {
                                echo '<option value="' . $land['country_name'] . '">' . $land['country_name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="geboortedatum">Geboortedatum</label>
                    <input type="date" name="geboortedatum" id="geboortedatum" required>
                </div>
                <div>
                    <label for="rekeningnummer">Rekeningnummer</label>
                    <input type="text" name="rekeningnummer" id="rekeningnummer" minlength="18" maxlength="18" 
                    pattern="[A-Z]{2}[0-9]{2}[A-Z]{4}[0-9]{10}" title="Een rekeningnummer bestaat uit 2 letters, 2 cijfers, 4 letters en vervolgens nog 10 cijfers" required>
                </div>
                <div>
                    <label for="abonnement">Abonnement</label>
                    <select name="abonnement" id="abonnement" required>
                        <?php if(isset($_GET['abonnement'])) {?>
                            <option value="Basic" <?php if($_GET['abonnement'] === 'basic') { echo 'selected'; }?>>Basic</option>
                            <option value="Premium"<?php if($_GET['abonnement'] === 'premium') { echo 'selected'; }?>>Premium</option>
                            <option value="Pro" <?php if($_GET['abonnement'] === 'pro') { echo 'selected'; }?>>Pro</option>
                        <?php } else {?>
                            <option value="Basic">Basic</option>
                            <option value="Premium">Premium</option>
                            <option value="Pro">Pro</option>
                        <?php } ?>
                    </select>

               </div>
               <div>
                    <label for="betaalwijze">Betaalwijze</label>
                    <select name="betaalwijze" id="betaalwijze" required>
                        <option value="Amex">Amex</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="Visa">Visa</option>
                    </select>
               </div>
                <div>
                    <button id="submit" type="submit" class="btn">Registreren</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>