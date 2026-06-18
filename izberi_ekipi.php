<?php
session_start();
include "baza.php";

$napaka = "";

if(isset($_POST['ekipa1']) && isset($_POST['ekipa2'])){

    $ekipa1 = $_POST['ekipa1'];
    $ekipa2 = $_POST['ekipa2'];

    if($ekipa1 == $ekipa2){

        $napaka = "Ne moreš izbrati iste ekipe za domače in goste!";

    }
    else{

        $_SESSION['ekipa1_id'] = $ekipa1;
        $_SESSION['ekipa2_id'] = $ekipa2;

        $sql = "
            SELECT naziv
            FROM ekipa
            WHERE id = $ekipa1
        ";

        $rez1 = mysqli_query($conn, $sql);

        $sql = "
            SELECT naziv
            FROM ekipa
            WHERE id = $ekipa2
        ";

        $rez2 = mysqli_query($conn, $sql);

        $ekipa1Podatki = mysqli_fetch_assoc($rez1);
        $ekipa2Podatki = mysqli_fetch_assoc($rez2);

        $_SESSION['ime_ekipa1'] = $ekipa1Podatki['naziv'];
        $_SESSION['ime_ekipa2'] = $ekipa2Podatki['naziv'];

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Izbira ekip</title>
<link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

<h1>IZBERI EKIPI</h1>

<form method="POST">

<p>Domača ekipa:</p>

<select name="ekipa1" required>

<?php

$sql = "
SELECT *
FROM ekipa
ORDER BY naziv
";

$rezultat = mysqli_query($conn, $sql);

while($vrstica = mysqli_fetch_assoc($rezultat)){

    echo "<option value='".$vrstica['id']."'>";
    echo $vrstica['naziv'];
    echo "</option>";
}

?>

</select>

<br><br>

<p>Gostujoča ekipa:</p>

<select name="ekipa2" required>

<?php

$sql = "
SELECT *
FROM ekipa
ORDER BY naziv
";

$rezultat = mysqli_query($conn, $sql);

while($vrstica = mysqli_fetch_assoc($rezultat)){

    echo "<option value='".$vrstica['id']."'>";
    echo $vrstica['naziv'];
    echo "</option>";
}

?>

</select>

<br><br>

<button type="submit">SHRANI EKIPI</button>

</form>

<?php
if($napaka != ""){
    echo "<p>".$napaka."</p>";
}
?>

<br><br>

<a href="index.php">
    <button type="button">NAZAJ</button>
</a>

</div>

</body>
</html>
