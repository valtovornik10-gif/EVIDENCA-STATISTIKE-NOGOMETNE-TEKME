<?php

session_start();

$_SESSION['konec'] = true;
$_SESSION['sporocilo'] = "Tekma se je končala.";

header("Location:index.php");
exit;

?>
