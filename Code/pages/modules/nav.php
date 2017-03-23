<?php
    session_start();
    if ($_SESSION['log'] == true)
    {
        echo '
        <form action="../pages/montage.php">
            <input type="submit" value="Go Montage" />
        </form>
        '; 
    }
    else
    {
        echo '
        <button onclick="ConnectionNeeded()">Go Montage</button>
        '; 
    }
    echo'
        <form method="POST" action="../pages/galerie.php">
            <input type="submit" name="page" value="Go Galerie" />
        </form>
    ';
    if ($_SESSION['log'] == true)
    {
        echo '
        <form action="../pages/ma_galerie.php">
            <input type="submit" value="Ma Galerie" />
        </form>
        '; 
    }
    else
    {
        echo '
        <button onclick="ConnectionNeeded()">Ma Galerie</button>
        '; 
    }
?>