<?php
session_start();

$_SESSION['gol1'] = 0;
$_SESSION['gol2'] = 0;

$_SESSION['dogodki1'] = [];
$_SESSION['dogodki2'] = [];

unset($_SESSION['zacetek']);
unset($_SESSION['konec']);
unset($_SESSION['tekma_id']);

unset($_SESSION['izloceni']);
unset($_SESSION['izven_igre']);
unset($_SESSION['notri_v_igri']);
unset($_SESSION['ze_vstopili']);

unset($_SESSION['zadnja_minuta']);

header("Location:index.php");
exit;
?>
