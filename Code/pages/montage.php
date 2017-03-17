<?php
    session_start();
    include_once '../class/class.php';
    include_once '../srcs/sprites_manager.php';
    include_once '../srcs/calc_quos.php';
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
            <form action="../scripts/deconnection.php">
                <input type="submit" value="Deconnection !" />
            </form>
            <form action="my_account.php">
                <input type="submit" value="Mon Compte" />
            </form>    
        </header>
        <main>
            <aside>
                <?php
                    foreach ($sprites as $sprite)
                    {
                        $quos = calc_quos($sprite->getSize());
                        echo"
                            <img 
                            id=sp" . $sprite->getID() . "' 
                            src='../sprites/sp" . $sprite->getID() . ".png' 
                            style='width:".$sprite->getWidth() * $quos."px;height:".$sprite->getHeight() * $quos."px;'
                            onclick='add_sprite(\"" . $sprite->get() . "\", " . $quos . ")'
                            >
                        ";
                        $sprite->change_size($quos);
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
                <button onclick="upload()">upload</button>
                </div>
            </article>
            <nav>
                nav
            </nav>
        </main>
        <footer id="footer">
        footer
                <div id="prev_zone">
                    <canvas id="prev0" width="640" height="480" ></canvas>
                    <canvas id="prev1" width="640" height="480" ></canvas>
                </div>
                <form action="" method="post">
                        <input type="hidden" id="input0" name="data0"></input>
                        <input type="hidden" id="input1" name="data1"></input>
                        <input type="submit" ></input>
                </form>
        </footer>

		<script src="../scripts/webcam.js" type="text/javascript"></script>
        <script src="../scripts/add_sprite.js" type="text/javascript"></script>
        <script src="../scripts/upload.js" type="text/javascript"></script>
        <script>

        </script>
    </body>

    </html>