<?php
    session_start();
    require_once '../class/class.php';
    require_once '../server/photos_manager.php';
    $photos = pull_photos(NULL);
    $nbPages = floor(count($photos) / 3) + 1;
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
                <div id ="galerie_list">
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
                            id = 'photo".$photo->getId()."'
                            src='../galerie/p".$photo->getId().".png'
                            onclick='delete(\"".$photo->getId()."\")'
                            class='galery_image'
                            >
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
                </div>
                <div id="selected_pict">
                </div>
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
        <script src="../scripts/select.js" type="text/javascript"></script>
        <script>
		function ConnectionNeeded() {
			alert("Connection requise pour cette section");
		}
        </script>
    </body>

    </html>