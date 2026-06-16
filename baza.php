<?php

$mysqli = new mysqli(
    "sql204.infinityfree.com",
    "if0_42007777",
    "D49VHU8KmL4Gj",
    "if0_42007777_statistike"
);

if($mysqli->connect_error){
    die("Napaka pri povezavi na bazo");
}
