<?php

$mysqli = new mysqli(
    "localhost",
    "root",
    "",
    "statistika"
);

if($mysqli->connect_error){
    die("Napaka pri povezavi na bazo");
}
