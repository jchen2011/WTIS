<?php
require_once 'db_connectie.php';

function haalTitelOp($id) {
    $verbinding = maakVerbinding();
    $query = $verbinding->prepare("SELECT title FROM Customer WHERE movie_id = ?");
    $qeury->execute([$id]);
    return $query->fetch();
}

function haalGenresOp() {
    $verbinding = maakVerbinding();
    $query = "SELECT genre_name FROM Genre";
    $data = $verbinding->query($query);
    return $data->fetchAll();
}

function zitTitelInDatabase($data) {
    $verbinding = maakVerbinding();
    $titel = '%' . $data . '%';
    $query = $verbinding->prepare("SELECT * FROM Movie WHERE title LIKE ?");
    $query->execute([$titel]);
    return $query->fetch();
}

function zitTitelEnGenreInDatabase($genre, $title) {
    $verbinding = maakVerbinding();
    $titel = '%' . $title . '%';
    $query = $verbinding->prepare("SELECT mg.movie_id, title FROM Movie_Genre mg INNER JOIN Movie m ON mg.movie_id = m.movie_id WHERE genre_name = ? AND title LIKE ?");
    $query->execute([$genre, $titel]);
    return $query->fetchAll();
}
