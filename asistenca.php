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

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $igralecId = $_POST['igralec'];
    $minuta = $_POST['minuta'];
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

        $rez = $mysqli->query("
            SELECT ime, priimek
            FROM igralec
            WHERE id = $igralecId
        ");

        $igralec = $rez->fetch_assoc();

        $imeIgralca =
            $igralec['ime']." ".
            $igralec['priimek'];

        $izpis = $imeIgralca." ".$minuta."' asistenca";

        $mysqli->query("
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
                2
            )
        ");

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

if($ekipa == 1){
    $ekipaId = $_SESSION['ekipa1_id'];
}
else{
    $ekipaId = $_SESSION['ekipa2_id'];
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8">
<title>Dodaj asistenco</title>
<link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

<h1>DODAJ ASISTENCO</h1>

<form method="POST">

<input type="hidden" name="ekipa" value="<?php echo $ekipa; ?>">

<p>Igralec:</p>

<select name="igralec" required>

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

<input type="number" name="minuta" min="1" max="90" required >

<br><br>

<button type="submit"> SHRANI ASISTENCO </button>

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
