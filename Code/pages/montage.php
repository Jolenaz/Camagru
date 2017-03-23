<?php
    session_start();
    if($_SESSION['log']==false)
	    header('Location: main.php');
    include_once '../class/class.php';
    include_once '../server/sprites_manager.php';
    include_once '../server/calc_quos.php';
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
                        $img = imagecreatefrompng('../sprites/sp' . $sprite->getID() . '.png');
                        $quos = calc_quos($img);
                        echo"
                            <img 
                            id=sp" . $sprite->getID() . "' 
                            src='../sprites/sp" . $sprite->getID() . ".png' 
                            style='width:".imagesx($img) * $quos."px;height:".imagesy($img) * $quos."px;'
                            onclick='add_sprite(\"" . $sprite->get() . "\", " . $quos . ", " . imagesx($img) . ", " . imagesy($img) . ")'
                            >
                        ";
                        imagedestroy($img);
                    }   
                ?>
            </aside>
            <article >
                <div>
                    article </br>
                    Vous etes dans la partie montage.
                </div>
                <div id="zone_montage">
                    <canvas id="canvas" width="640" height="480" ></canvas>
                    <video id="videoScreen"></video>     
                </div>
                <button onclick="getVideo()">Start Cam</button>
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
        <script>

        </script>
    </body>

    </html>