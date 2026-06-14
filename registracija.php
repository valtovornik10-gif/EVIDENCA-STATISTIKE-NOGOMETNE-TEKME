<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="prijava.css">
</head>
<body>

<div class="login-box">

    <h1>REGISTRACIJA</h1>

    <?php
    if(isset($_SESSION['napaka'])){
        echo "<p class='napaka'>".$_SESSION['napaka']."</p>";
        unset($_SESSION['napaka']);
    }

    if(isset($_SESSION['uspeh'])){
        echo "<p class='uspeh'>".$_SESSION['uspeh']."</p>";
        unset($_SESSION['uspeh']);
    }
    ?>

    <form action="registracija_preveri.php" method="POST">

        <input type="text" name="uporabnisko_ime" placeholder="Uporabniško ime" required >

        <input type="password" name="geslo" placeholder="Geslo" required >

        <button type="submit" name="registracija">REGISTRIRAJ</button>

    </form>

    <br>

    <a href="prijava.php">
        Nazaj na prijavo
    </a>

</div>

</body>
</html>
