<?php
    session_start();
    if ($_SESSION['log'] == true)
    {
        echo '
        <form action="../pages/montage.php">
            <input class="nav_button" type="submit" value="Go Montage" />
        </form>
        '; 
    }
    else
    {
        echo '
        <button class="nav_button" onclick="ConnectionNeeded()">Go Montage</button>
        '; 
    }
    echo'
        <form method="POST" action="../pages/galerie.php">
            <input class="nav_button" type="submit" name="page" value="Go Galerie" />
        </form>
    ';
    echo'
        <form action="../pages/main.php">
            <input class="nav_button" type="submit" value="Go Accueil" />
        </form>
    ';
    if ($_SESSION['log'] == true)
    {
        echo '
        <form method="POST" action="../pages/ma_galerie.php">
            <input class="nav_button" type="submit" name="page" value="Ma Galerie" />
        </form>
        '; 
    }
    else
    {
        echo '
        <button class="nav_button" onclick="ConnectionNeeded()">Ma Galerie</button>
        '; 
    }
?>