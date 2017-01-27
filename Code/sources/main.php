<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Camagru</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <header>
        <?php
        if ($_SESSION['log'] == false)
        {
            echo '
            <form action="connection.php">
                <input type="submit" value="Identifiez-vous !" />
            </form>
            ';
        }
        else
        {
            
        }
        
        ?>
    </header>
    <main>
        <aside>
            aside
        </aside>
        <article>
            article
        </article>
        <nav>
            nav
        </nav>
    </main>
    <footer>
        footer
    </footer>


</body>

</html>