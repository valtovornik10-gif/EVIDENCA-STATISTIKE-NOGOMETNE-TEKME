<?php
session_start();

require_once "baza.php";

if(isset($_POST['prijava'])){

    $uporabnisko_ime = $_POST['uporabnisko_ime'];
    $geslo = $_POST['geslo'];

    $sql = "
    SELECT *
    FROM uporabnik
    WHERE uporabnisko_ime='$uporabnisko_ime'
    AND geslo='$geslo'
    ";

    $result = $mysqli->query($sql);

    if($result->num_rows == 1){

        $uporabnik = $result->fetch_assoc();

        $_SESSION['prijavljen'] = true;
        $_SESSION['uporabnik'] = $uporabnik['uporabnisko_ime'];
        $_SESSION['vloga'] = $uporabnik['vloga'];
        $_SESSION['id'] = $uporabnik['id'];

        header("Location: index.php");
        exit;
    }
    else{

        $_SESSION['napaka'] = "Napačno uporabniško ime ali geslo!";

        header("Location: prijava.php");
        exit;
    }
}
?>
