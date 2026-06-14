<?php
session_start();

if($_SESSION['vloga'] != "administrator"){
    header("Location:index.php");
    exit;
}

include "baza.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $naziv = $_POST['naziv'];
    $drzava = $_POST['drzava'];

    $mysqli->query("
    INSERT INTO ekipa
    (
        naziv,
        drzava
    )
    VALUES
    (
        '$naziv',
        '$drzava'
    )
    ");

    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj ekipo</title>
    <link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

    <h1>DODAJ EKIPO</h1>

    <form method="POST">

        <p>Naziv ekipe:</p>
        <input type="text" name="naziv" required>

        <br><br>

        <p>Država:</p>
        <input type="text" name="drzava" required>

        <br><br>

        <button type="submit">SHRANI EKIPO</button>

    </form>

    <br>

    <a href="index.php">
        <button type="button">NAZAJ</button>
    </a>

</div>

</body>
</html>
