<?php
    session_start();
    if($_SESSION['log']==false)
	    header('Location: main.php');
    include_once '../class/class.php';
    include_once '../server/photos_manager.php';
    $photos = pull_photos();
    $nbPages = floor(count($photos) / 3);
    $page = filter_input(INPUT_POST, page, FILTER_SANITIZE_STRING);
    $page = ($page == "Go Galerie"? 1 : $page);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Camagru</title>
        <?php
        include('../css/css.php');
        ?>

    </head>

    <body>
        <header>
            <?php
                include('modules/header.php');
            ?>   
        </header>
        <main>
            <aside>

            </aside>
            <article>
                <?php
                    for($i = 3 * ($page - 1); $i < 3 * $page; ++$i)
                    {
                        $photo = $photos[$i];
                        echo"
                        <div>
                        Nom: ".$photo->getName()."</br>
                        UserName: ".$photo->getUserName()."</br>
                        Likes: ".$photo->getLikes()."</br>
                        </div>
                        ";
                    }
                    for($j = 1; $j <= $nbPages; ++$j)
                    {
                        echo'
                        <form method="POST" action="../pages/galerie.php">
                            <input type="submit" name="page" value="'.$j.'" />
                        </form>
                        ';
                    }
                ?>
            </article>
            <nav>
			    <?php
                    include('modules/nav.php');
        		?>
            </nav>
        </main>
        <footer id="footer">

        </footer>
        <script src="../scripts/httpRequestManager.js" type="text/javascript"></script>
		<script src="../scripts/webcam.js" type="text/javascript"></script>
        <script src="../scripts/add_sprite.js" type="text/javascript"></script>
        <script src="../scripts/upload.js" type="text/javascript"></script>
        <script>

        </script>
    </body>

    </html>