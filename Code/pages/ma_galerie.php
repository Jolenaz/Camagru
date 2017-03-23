<?php
    session_start();
    if($_SESSION['log']==false)
	    header('Location: main.php');
    include_once '../class/class.php';
    include_once '../server/photos_manager.php';
    $photos = pull_photos();
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
            <article >

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