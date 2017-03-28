<?php
    session_start();
    if($_SESSION['log']==false)
	    header('Location: main.php');
    include_once '../class/class.php';
    include_once '../server/sprites_manager.php';
    include_once '../server/calc_quos.php';
    if ($_SESSION['fond'] === true)
        {
            $use_fond = true;
            $_SESSION['fond'] = false;
        }
    $sprites = pull_sprites();
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
                <?php  
                    foreach ($sprites as $sprite)
                    {
                        $format = $sprite->getFormat();
                        if ($format == "png")
                            $img = imagecreatefrompng('../sprites/sp' . $sprite->getID() . '.png');
                        else if ($format == "jpeg")
                            $img = imagecreatefromjpeg('../sprites/sp' . $sprite->getID() . '.jpeg');
                        else
                            break;
                        $quos = calc_quos($img, 100);
                        echo"
                            <img 
                            id=sp" . $sprite->getID() . "
                            src='../sprites/sp" . $sprite->getID() . ".".$sprite->getFormat()."' 
                            style='width:".imagesx($img) * $quos."px;height:".imagesy($img) * $quos."px;'
                            onclick='add_sprite(\"" . $sprite->get() . "\", " . $quos . ", " . imagesx($img) . ", " . imagesy($img) . ")'
                            >
                        ";
                        imagedestroy($img);
                    }   
                ?>
                <div class = "sprite_upload">
                    Telecharger une nouvelle icone.
                    <form action="../server/upload_sprite.php" method="post" enctype="multipart/form-data">
                        Fichier: <input type="file" name="fileToUpload" id="fileToUpload"><br>
                        Nom: <input type="text" id="name"><br>
                        format:<br>
                        <input type="radio" name="format" value="png" checked>png<br>
                        <input type="radio" name="format" value="jpeg">jpeg<br>
                        <input type="submit" value="Ajouter" name="submit">
                    </form>
                </div>
            </aside>
            <article >
                <div>
                    article </br>
                    Vous etes dans la partie montage.
                </div>
                <div id="zone_montage">
                    <canvas id="canvas" width="640" height="480" ></canvas>
                    <div id='fond'>
                        <video id="videoScreen"></video>
                        <?php
                            if ($use_fond === true)
                            {
                                $info_f = getimagesize("../tmp");
                                if ($info_f['mime'] == "image/png")
                                    $img_f = imagecreatefrompng("../tmp");
                                else if ($info_f['mime'] == "image/jpeg")
                                    $img_f = imagecreatefromjpeg("../tmp");
                                $quos_f = calc_quos($img_f, 500);
                                echo"
                                    <img src='../tmp'
                                    id='image_fond'
                                    style='width:".imagesx($img_f) * $quos_f."px; height:".imagesy($img_f) * $quos_f."px;'>
                                ";
                            }
                        ?>
                    </div>
                </div>
                <button onclick="getVideo()">Démarrer la WebCam</button>
                <div id='uploader'>
                    <button onclick="upload_fond()">Utiliser une photo</button>
                </div>
                <div id="current_sprites">
                </div>
            </article>
            <nav>
			    <?php
                    include('modules/nav.php');
        		?>
            </nav>
        </main>
        <footer id="footer">
        footer
                <div id="prev_zone">
                    <canvas id="prev0" width="640" height="480" ></canvas>
                    <canvas id="prev1" width="640" height="480" ></canvas>
                </div>
        </footer>
        <script src="../scripts/httpRequestManager.js" type="text/javascript"></script>
		<script src="../scripts/webcam.js" type="text/javascript"></script>
        <script src="../scripts/add_sprite.js" type="text/javascript"></script>
        <script src="../scripts/upload.js" type="text/javascript"></script>
        <script src="../scripts/upload_fond.js" type="text/javascript"></script>
        <script>

        </script>
    </body>

    </html>