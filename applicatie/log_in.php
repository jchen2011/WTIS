<?php
require_once 'data/klant.php';

session_start();
if(!empty($_POST['email']) && !empty($_POST['wachtwoord'])) {
    $user = verkrijgGegevens($_POST['email']);

    if (password_verify($_POST['wachtwoord'], $user['password']) && $user) {
        $_SESSION['user'] = $user;
        header('Location: genre/ingelogd.php');
    } else {
        header('Location: inloggen.php?inloggen=login');
    }
} else {
    header('Location: inloggen.php?inloggen=empty');
}