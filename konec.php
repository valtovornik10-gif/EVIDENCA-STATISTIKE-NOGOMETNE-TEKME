<?php

session_start();


$_SESSION['sporocilo'] = "Tekma se je končala.";

header("Location:index.php");
exit;

?>
