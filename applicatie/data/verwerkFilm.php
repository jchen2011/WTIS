<?php
require_once 'db_connectie.php';

// __DIR__.

function haalTitelTijdJaarVerhaalOp($id) {
    $verbinding = maakVerbinding();
    $query = $verbinding->prepare("SELECT title, duration, description, publication_year FROM Movie WHERE movie_id = ?");
    $query->execute([$id]);
    return $query->fetch();
}

function haalDirectorsOp($id) {
    $verbinding = maakVerbinding();
    $query = $verbinding->prepare("SELECT firstname, lastname FROM Movie_director md INNER JOIN Person p ON md.person_id = p.person_id WHERE movie_id = ?");
    $query->execute([$id]);
    return $query->fetchAll();
}

function haalCastOp($id) {
    $verbinding = maakVerbinding();
    $query = $verbinding->prepare("SELECT firstname, lastname, role FROM Movie_Cast mc INNER JOIN Person p ON mc.person_id = p.person_id WHERE movie_id = ?");
    $query->execute([$id]);
    return $query->fetchAll();
}

function haal4RecenteFilmsOp() {
    $verbinding = maakVerbinding();
    $query = "SELECT TOP 4 movie_id, title FROM Movie ORDER BY publication_year DESC";
    $data = $verbinding->query($query);
    return $data->fetchAll();
}

function haal4FilmsUitGenre($genre) {
    $verbinding = maakVerbinding();
    $query = $verbinding->prepare("SELECT TOP 4 m.movie_id, title FROM Movie m INNER JOIN Movie_Genre mg ON mg.movie_id = m.movie_id WHERE genre_name = ?");
    $query->execute([$genre]);
    return $query->fetchAll();
}