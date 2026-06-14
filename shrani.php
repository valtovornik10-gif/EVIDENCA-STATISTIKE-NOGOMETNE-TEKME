<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Analiza tekme</title>
    <link rel="stylesheet" href="glavna.css">
</head>
<body>

<div class="vsebnik">

    <h1>ANALIZA TEKME</h1>

    <h2>
        <?php echo $_SESSION['ime_ekipa1']; ?>
        :
        <?php echo $_SESSION['gol1']; ?>
    </h2>

    <?php

    foreach($_SESSION['dogodki1'] as $d){

        echo "<p>$d</p>";

    }

    ?>

    <hr>

    <h2>
        <?php echo $_SESSION['ime_ekipa2']; ?>
        :
        <?php echo $_SESSION['gol2']; ?>
    </h2>

    <?php

    foreach($_SESSION['dogodki2'] as $d){

        echo "<p>$d</p>";

    }

    ?>

    <br>

    <h2>
        KONČNI REZULTAT:
        <?php echo $_SESSION['gol1']; ?>
        :
        <?php echo $_SESSION['gol2']; ?>
    </h2>

    <br>
	<div class="zadnji">

		<a href="index.php">
			<button type="button" class="gumb1">NAZAJ</button>
		</a>

		<a href="zapri.php">
			<button type="button" class="gumb1" >ODJAVA</button>
		</a>
	
		<a href ="viri.php">
			<button type="button" class="gumb1">VIRI</button>
		</a>
	</div>

</div>

</body>
</html>
