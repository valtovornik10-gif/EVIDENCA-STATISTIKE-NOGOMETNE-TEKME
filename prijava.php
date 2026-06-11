<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="prijava.css">
</head>
<body>

<div class="login-box">

    <h1>EVIDENCA STATISTIKE</h1>

    <?php
    if(isset($_SESSION['napaka'])){
        echo "<p class='napaka'>".$_SESSION['napaka']."</p>";
        unset($_SESSION['napaka']);
    }
    ?>

    <form action="prijava_preveri.php" method="POST">

        <input type="text" name="uporabnisko_ime" placeholder="Uporabniško ime" required >

        <input type="password" name="geslo" placeholder="Geslo" required >

        <button type="submit" name="prijava">
            PRIJAVA
        </button>

    </form>

</div>

</body>
</html>
