<?php
session_start();
include "baza.php";

if(!isset($_SESSION['ekipa1_id']) || !isset($_SESSION['ekipa2_id'])){
    header("Location: izberi_ekipi.php");
    exit;
}

$domaca = $_SESSION['ekipa1_id'];
$gostujoca = $_SESSION['ekipa2_id'];

$mysqli->query("
INSERT INTO tekma
(
    stadion,
    domaca_ekipa_id,
    gostujoca_ekipa_id
)
VALUES
(
    'Neznan stadion',
    $domaca,
    $gostujoca
)
");

$_SESSION['tekma_id'] = $mysqli->insert_id;

$_SESSION['gol1'] = 0;
$_SESSION['gol2'] = 0;

$_SESSION['dogodki1'] = [];
$_SESSION['dogodki2'] = [];

unset($_SESSION['zadnja_minuta']);
unset($_SESSION['izloceni']);

$_SESSION['sporocilo'] = "Tekma se je začela.";

header("Location:index.php");
exit;
?>
