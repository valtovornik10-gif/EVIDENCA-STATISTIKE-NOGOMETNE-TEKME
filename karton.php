<?php
session_start();

if(!isset($_SESSION['ekipa1_id']) || !isset($_SESSION['ekipa2_id'])){
    header("Location: izberi_ekipi.php");
    exit;
}

if(!isset($_SESSION['tekma_id'])){
    header("Location: zacetek.php");
    exit;
}

include "baza.php";

$ekipa = $_GET['ekipa'];
$napaka = "";

if($ekipa == 1){
    $ekipaId = $_SESSION['ekipa1_id'];
}
else{
    $ekipaId = $_SESSION['ekipa2_id'];
}

if(isset($_POST['igralec'])){

    $igralecId = $_POST['igralec'];
    $minuta = $_POST['minuta'];
    $tip = $_POST['tip'];
    $ekipa = $_POST['ekipa'];

    if(isset($_SESSION['zadnja_minuta'])){
        $zadnjaMinuta = $_SESSION['zadnja_minuta'];
    }
    else{
        $zadnjaMinuta = 0;
    }

    if($minuta < $zadnjaMinuta){

        $napaka = "Vnesti moraš minuto ".$zadnjaMinuta." ali več.";

    }
    else{

        $_SESSION['zadnja_minuta'] = $minuta;

        $sql = "
            SELECT ime, priimek
            FROM igralec
            WHERE id = $igralecId
        ";

        $rez = mysqli_query($conn, $sql);
        $igralec = mysqli_fetch_assoc($rez);

        $imeIgralca =
            $igralec['ime']." ".
            $igralec['priimek'];

        if($tip == "Rumeni"){
            $tipId = 3;
        }
        else{
            $tipId = 4;

            if(!isset($_SESSION['izloceni'])){
                $_SESSION['izloceni'] = [];
            }

            $_SESSION['izloceni'][] = $igralecId;
        }

        $izpis = $imeIgralca." ".$minuta."' ".$tip." karton";

        $sql = "
            INSERT INTO dogodek
            (
                minuta,
                tekma_id,
                igralec_id,
                uporabnik_id,
                tip_dogodka_id
            )
            VALUES
            (
                $minuta,
                ".$_SESSION['tekma_id'].",
                $igralecId,
                ".$_SESSION['id'].",
                $tipId
            )
        ";

        mysqli_query($conn, $sql);

        if($ekipa == 1){
            $_SESSION['dogodki1'][] = $izpis;
        }
        else{
            $_SESSION['dogodki2'][] = $izpis;
        }

        header("Location:index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8">
<title>Dodaj karton</title>
<link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

<h1>DODAJ KARTON</h1>

<form method="POST">

<input type="hidden" name="ekipa" value="<?php echo $ekipa; ?>">

<p>Igralec:</p>

<select name="igralec" required>

<?php

$sql = "
SELECT *
FROM igralec
WHERE ekipa_id = $ekipaId
ORDER BY priimek
";

$rezultat = mysqli_query($conn, $sql);

while($i = mysqli_fetch_assoc($rezultat)){

    if(
        isset($_SESSION['izloceni']) &&
        in_array($i['id'], $_SESSION['izloceni'])
    ){
        continue;
    }

    if(
        isset($_SESSION['izven_igre']) &&
        in_array($i['id'], $_SESSION['izven_igre'])
    ){
        continue;
    }

    echo "<option value='".$i['id']."'>";
    echo $i['ime']." ".$i['priimek'];
    echo "</option>";
}

?>

</select>

<br><br>

<p>Minuta:</p>

<input type="number" name="minuta" min="1" max="90" required>

<br><br>

<p>Vrsta kartona:</p>

<select name="tip">
    <option value="Rumeni">Rumeni</option>
    <option value="Rdeči">Rdeči</option>
</select>

<br><br>

<button type="submit">SHRANI KARTON</button>

</form>

<?php
if($napaka != ""){
    echo "<p>".$napaka."</p>";
}
?>

<br>

<a href="index.php">
    <button type="button">Nazaj</button>
</a>

</div>

</body>
</html>
