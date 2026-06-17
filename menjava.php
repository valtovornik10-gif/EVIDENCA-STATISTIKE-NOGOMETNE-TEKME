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

if(isset($_POST['igralecVen']) && isset($_POST['igralecNot'])){

    $igralecVen = $_POST['igralecVen'];
    $igralecNot = $_POST['igralecNot'];
    $minuta = $_POST['minuta'];
    $ekipa = $_POST['ekipa'];

    if($igralecVen == $igralecNot){

        $napaka = "Isti igralec ne more biti ven in noter.";

    }
    else{

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

            $rez1 = $mysqli->query("
                SELECT ime, priimek
                FROM igralec
                WHERE id = $igralecVen
            ");

            $ven = $rez1->fetch_assoc();

            $imeVen =
                $ven['ime']." ".
                $ven['priimek'];

            $rez2 = $mysqli->query("
                SELECT ime, priimek
                FROM igralec
                WHERE id = $igralecNot
            ");

            $not = $rez2->fetch_assoc();

            $imeNot =
                $not['ime']." ".
                $not['priimek'];

            $izpis =
                $minuta."' menjava: ".
                $imeVen.
                " ➜ ".
                $imeNot;

            $mysqli->query("
                INSERT INTO menjava_igralec
                (
                    minuta,
                    igralec_ven_id,
                    igralec_noter_id,
                    tekma_id
                )
                VALUES
                (
                    $minuta,
                    $igralecVen,
                    $igralecNot,
                    ".$_SESSION['tekma_id']."
                )
            ");

            if($ekipa == 1){
                $_SESSION['dogodki1'][] = $izpis;
            }
            else{
                $_SESSION['dogodki2'][] = $izpis;
            }

            if(!isset($_SESSION['izven_igre'])){
                $_SESSION['izven_igre'] = [];
            }

            $_SESSION['izven_igre'][] = $igralecVen;

            header("Location:index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dodaj menjavo</title>
<link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

<h1>DODAJ MENJAVO</h1>

<form method="POST">

<input type="hidden" name="ekipa" value="<?php echo $ekipa; ?>">

<p>Igralec ven:</p>

<select name="igralecVen" required>

<?php

$rezultat = $mysqli->query("
SELECT *
FROM igralec
WHERE ekipa_id = $ekipaId
ORDER BY priimek
");

while($i = $rezultat->fetch_assoc()){

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

<p>Igralec noter:</p>

<select name="igralecNot" required>

<?php

$rezultat = $mysqli->query("
SELECT *
FROM igralec
WHERE ekipa_id = $ekipaId
ORDER BY priimek
");

while($i = $rezultat->fetch_assoc()){

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

<input type="number" name="minuta" min="1" max="90" required
>

<br><br>

<button type="submit">SHRANI MENJAVO</button>

</form>

<?php
if($napaka != ""){
    echo "<p>".$napaka."</p>";
}
?>

<br>

<a href="index.php">
    <button type="button"> Nazaj </button>
</a>

</div>

</body>
</html>
