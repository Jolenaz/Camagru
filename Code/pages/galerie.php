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
            <?php
            if ($_SESSION['log'] == false)
            {
                echo "
                <div class='indication'>
                Vous devez etre connnecter pour pouvoir liker une photo.
                </div>
                ";
            }
            ?>
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
                            ";
                            if ($_SESSION['log'] == true)
                            {
                                if($photo->is_liked_by($_SESSION['id']) === false)
                                    echo '
                                    <form method="POST" atcion="../server/like.php">
                                        <input type="submit" name="like" value="Liker"
                                    </form>
                                    ';
                                else
                                    echo '
                                    <form method="POST" atcion="../server/like.php">
                                        <input type="submit" name="like" value="Unliker"
                                    </form>
                                    ';
                            }
                            echo"
                            <img 
                            id = 'photo".$photo->getId()."'
                            src='../galerie/p".$photo->getId().".png'
                            onclick='select(\"".$photo->getId()."\")'
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
        <script src="../scripts/galerieManager.js" type="text/javascript"></script>
        <script>
		function ConnectionNeeded() {
			alert("Connection requise pour cette section");
		}
        </script>
    </body>

    </html>