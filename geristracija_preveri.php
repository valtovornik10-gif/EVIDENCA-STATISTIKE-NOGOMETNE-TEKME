<?php
session_start();

require_once "baza.php";

if(isset($_POST['registracija'])){

    $uporabnisko_ime = $_POST['uporabnisko_ime'];
    $geslo = $_POST['geslo'];

    $preveri = $mysqli->query("
        SELECT *
        FROM uporabnik
        WHERE uporabnisko_ime='$uporabnisko_ime'
    ");

    if($preveri->num_rows > 0){

        $_SESSION['napaka'] =
            "Uporabniško ime že obstaja!";

        header("Location: registracija.php");
        exit;
    }

    $mysqli->query("
        INSERT INTO uporabnik
        (uporabnisko_ime, geslo, vloga)
        VALUES
        ('$uporabnisko_ime', '$geslo', 'uporabnik')
    ");

    $_SESSION['uspeh'] =
        "Registracija uspešna!";

    header("Location: prijava.php");
    exit;
}
?>
