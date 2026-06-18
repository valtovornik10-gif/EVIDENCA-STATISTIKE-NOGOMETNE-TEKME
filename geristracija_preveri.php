<?php
session_start();

require_once "baza.php";

if(isset($_POST['registracija'])){

    $uporabnisko_ime = $_POST['uporabnisko_ime'];
    $geslo = $_POST['geslo'];

    $sql = "SELECT * FROM uporabnik
            WHERE uporabnisko_ime='$uporabnisko_ime'";

    $preveri = mysqli_query($conn, $sql);

    if(mysqli_num_rows($preveri) > 0){

        $_SESSION['napaka'] = "Uporabniško ime že obstaja!";

        header("Location: registracija.php");
        exit();
    }

    $sql = "INSERT INTO uporabnik
            (uporabnisko_ime, geslo, vloga)
            VALUES
            ('$uporabnisko_ime', '$geslo', 'uporabnik')";

    mysqli_query($conn, $sql);

    header("Location: prijava.php");
    exit();
}
?>
