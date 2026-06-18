<?php
session_start();

if($_SESSION['vloga'] != "administrator"){
    header("Location:index.php");
    exit;
}

include "baza.php";

if(isset($_POST['ime']) && isset($_POST['priimek'])){

    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $stevilka = $_POST['stevilka'];
    $pozicija = $_POST['pozicija'];
    $ekipa = $_POST['ekipa'];

    $sql = "
    INSERT INTO igralec
    (
        ime,
        priimek,
        stevilka,
        pozicija,
        ekipa_id
    )
    VALUES
    (
        '$ime',
        '$priimek',
        $stevilka,
        '$pozicija',
        $ekipa
    )
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dodaj igralca</title>
<link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

<h1>DODAJ IGRALCA</h1>

<form method="POST">

<p>Ime:</p>
<input type="text" name="ime" required>

<br><br>

<p>Priimek:</p>
<input type="text" name="priimek" required>

<br><br>

<p>Številka:</p>
<input type="number" name="stevilka" min="1" max="99" required>

<br><br>

<p>Pozicija:</p>

<select name="pozicija">

    <option value="Vratar">Vratar</option>
    <option value="Branilec">Branilec</option>
    <option value="Vezist">Vezist</option>
    <option value="Napadalec">Napadalec</option>

</select>

<br><br>

<p>Ekipa:</p>

<select name="ekipa">

<?php

$sql = "
SELECT *
FROM ekipa
ORDER BY naziv
";

$rezultat = mysqli_query($conn, $sql);

while($e = mysqli_fetch_assoc($rezultat)){

    echo "<option value='".$e['id']."'>";
    echo $e['naziv'];
    echo "</option>";
}

?>

</select>

<br><br>

<button type="submit">SHRANI IGRALCA</button>

</form>

<br>

<a href="index.php">
    <button type="button">NAZAJ</button>
</a>

</div>

</body>
</html>
