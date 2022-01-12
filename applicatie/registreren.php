<?php

require_once 'data/klant.php';

$allesIngevuld = isset($_POST['email']) && isset($_POST['wachtwoord']) && isset($_POST['wachtwoord_check']) && isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['land']) && isset($_POST['geboortedatum']) && isset($_POST['rekeningnummer']) && isset($_POST['abonnement']) && isset($_POST['betaalwijze']);
$land = zitLandInDatabase($_POST['land']);
if (empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord_check']) || empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['land']) || empty($_POST['geboortedatum']) || empty($_POST['rekeningnummer']) || empty($_POST['abonnement']) || empty($_POST['betaalwijze'])) {
    header('Location: ../registratieformulier.php?registreren=empty');
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: ../registratieformulier.php?registreren=email');
} else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['voornaam'])) {
    header('Location: ../registratieformulier.php?registreren=voornaam');
} else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['achternaam'])) {
    header('Location: ../registratieformulier.php?registreren=achternaam');
} else if (!preg_match("/^[a-zA-Z]*$/", $_POST['land']) || !$land) {
    header('Location: ../registratieformulier.php?registreren=land');
} else if ($_POST['wachtwoord'] !== $_POST['wachtwoord_check']) {
    header('Location: ../registratieformulier.php?registreren=wachtwoord');
} else if (!preg_match('/[A-Z]{2}[0-9]{2}[A-Z]{4}[0-9]{10}/', $_POST['rekeningnummer'])) {
    header('Location: ../registratieformulier.php?registreren=rekeningnummer');
} else if ($allesIngevuld) {
    maak($_POST['email'], $_POST['wachtwoord'], $_POST['voornaam'], $_POST['achternaam'], $_POST['land'], $_POST['geboortedatum'], $_POST['rekeningnummer'], $_POST['abonnement'], $_POST['betaalwijze']);
    header('Location: log_in.php', true, 307);
}

?>