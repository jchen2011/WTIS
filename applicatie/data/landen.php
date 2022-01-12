<?php
require_once 'db_connectie.php';

function haalAlleLandenOp() {
    $verbinding = maakVerbinding();
    $query = "SELECT * FROM Country";
    $data = $verbinding->query($query);
    return $data->fetchAll();
}

