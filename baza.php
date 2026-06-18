<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "statistika"
);

if (!$conn) {
    die("Napaka pri povezavi: " . mysqli_connect_error());
}


?>
