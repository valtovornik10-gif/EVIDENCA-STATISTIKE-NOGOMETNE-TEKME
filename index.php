<?php
session_start();

if(!isset($_SESSION['prijavljen'])){
    header("Location: prijava.php");
    exit;
}

if(!isset($_SESSION['gol1'])){
    $_SESSION['gol1'] = 0;
}

if(!isset($_SESSION['gol2'])){
    $_SESSION['gol2'] = 0;
}

if(!isset($_SESSION['dogodki1'])){
    $_SESSION['dogodki1'] = [];
}

if(!isset($_SESSION['dogodki2'])){
    $_SESSION['dogodki2'] = [];
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Tekma</title>
    <link rel="stylesheet" href="glavna.css">
</head>

<body>

<div class="vsebnik">

    <div class="zgoraj-uporabnik">

        <?php
        if($_SESSION['vloga'] == "administrator"){
        ?>
            <div class="admin-gumbi">

                <a href="dodaj_ekipo.php">
                    <button type="button" class="gumb1">
                        DODAJ EKIPO
                    </button>
                </a>

                <a href="dodaj_igralca.php">
                    <button type="button" class="gumb1">
                        DODAJ IGRALCA
                    </button>
                </a>

            </div>
        <?php
        }
        ?>

        <div class="odjava-gumb">

            <a href="odjava.php">
                <button type="button" class="gumb-odjava">
                    ODJAVA
                </button>
            </a>

            <p class="prijavljen">
                <?php echo $_SESSION['uporabnik']; ?>
                (<?php echo $_SESSION['vloga']; ?>)
            </p>

        </div>

    </div>

    <div class="zgoraj">

        <div class="levo-ime">

            <?php

            if(!isset($_SESSION['ime_ekipa1'])){
                $_SESSION['ime_ekipa1'] = "Domači";
            }

            echo $_SESSION['ime_ekipa1'];

            ?>

        </div>

        <div class="sredina">

            <a href="izberi_ekipi.php">
                <button type="button" class="gumb-ekipi">
                    IZBERI EKIPI
                </button>
            </a>

            <div class="naslov-rezultat">
                REZULTAT
            </div>

            <div class="rezultat">
                <?php
                echo $_SESSION['gol1']." : ".$_SESSION['gol2'];
                ?>
            </div>

            <div class="minuta">
                0'
            </div>

            <?php

            if(isset($_SESSION['sporocilo'])){

                echo "<div class='sporocilo'>";
                echo $_SESSION['sporocilo'];
                echo "</div>";

                unset($_SESSION['sporocilo']);
            }

            ?>

            <br>

            <a href="zacetek.php">
                <button type="button" class="gumb-zacetek">
                    ZAČNI TEKMO
                </button>
            </a>

            <a href="konec.php">
                <button type="button" class="gumb-konec">
                    KONČAJ TEKMO
                </button>
            </a>

        </div>

        <div class="desno-ime">

            <?php

            if(!isset($_SESSION['ime_ekipa2'])){
                $_SESSION['ime_ekipa2'] = "Gostje";
            }

            echo $_SESSION['ime_ekipa2'];

            ?>

        </div>

    </div>

    <div class="glavni-del">

        <div class="stran">

            <div class="gumbi">

                <a href="gol.php?ekipa=1">
                    <button type="button">
                        DODAJ GOL
                    </button>
                </a>

                <a href="asistenca.php?ekipa=1">
                    <button type="button">
                        DODAJ ASISTENCO
                    </button>
                </a>

                <a href="karton.php?ekipa=1">
                    <button type="button">
                        DODAJ KARTON
                    </button>
                </a>

                <a href="menjava.php?ekipa=1">
                    <button type="button">
                        DODAJ MENJAVO
                    </button>
                </a>

            </div>

            <div class="dogodki">

                <?php
                foreach($_SESSION['dogodki1'] as $d){
                    echo "<div class='dogodek'>$d</div>";
                }
                ?>

            </div>

        </div>

        <div class="stran">

            <div class="gumbi">

                <a href="gol.php?ekipa=2">
                    <button type="button">
                        DODAJ GOL
                    </button>
                </a>

                <a href="asistenca.php?ekipa=2">
                    <button type="button">
                        DODAJ ASISTENCO
                    </button>
                </a>

                <a href="karton.php?ekipa=2">
                    <button type="button">
                        DODAJ KARTON
                    </button>
                </a>

                <a href="menjava.php?ekipa=2">
                    <button type="button">
                        DODAJ MENJAVO
                    </button>
                </a>

            </div>

            <div class="dogodki">

                <?php
                foreach($_SESSION['dogodki2'] as $d){
                    echo "<div class='dogodek'>$d</div>";
                }
                ?>

            </div>

        </div>

    </div>

    <div class="spodaj">

        
        
        
        <a href="reset.php">
            <button type="button" class="reset-gumb">
                RESET
            </button>
        </a>
       
        
        

        <a href="zapri.php">
            <button type="button" class="gumb-zapri">
                ZAPRI
            </button>
        </a>

        <a href="shrani.php">
            <button type="button" class="gumb-shrani">
                SHRANI IN ZAKLJUČI
            </button>
        </a>

    </div>

</div>

</body>
</html>
