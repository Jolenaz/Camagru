<?php
    session_start();
    if($_SESSION['log']==false)
	    header('Location: main.php');
    require_once '../class/class.php';
    require_once '../server/photos_manager.php';
    $photos = pull_photos($_SESSION['user']);
    $nbPages = floor(count($photos) / 3) + 1;
    $page = filter_input(INPUT_POST, page, FILTER_SANITIZE_STRING);
    $page = ($page == "Ma Galerie"? 1 : $page);
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
                <?php
                    for($i = 3 * ($page - 1); $i < 3 * $page; ++$i)
                    {
                        $photo = $photos[$i];
                        if ($photo === null)
                            break;
                        echo"
                        <div>
                        Nom: ".$photo->getName()."</br>
                        UserName: ".$photo->getUserName()."</br>
                        Likes: ".$photo->getLikes()."</br>
                        <img 
                        src='../galerie/p".$photo->getId().".png'
                        onclick='delete(\"".$photo->getId()."\")'
                        onload='print_comment(\"".$photo->getId()."\")'
                        class='galery_image'
                        >
                        <div id='my_pict_comment_".$photo->getId()."' class='comment_ma_galerie'></div>
                        </div>

                        ";
                    }
                    for($j = 1; $j <= $nbPages; ++$j)
                    {
                        echo'
                        <form method="POST" action="../pages/ma_galerie.php">
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
        <script src="../scripts/print_comment.js" type="text/javascript"></script>

        </script>
    </body>

    </html>