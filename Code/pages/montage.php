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
        <link rel="stylesheet" href="../css/main.css">

    </head>

    <body onload="init_canvas()">
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
                            onclick='add_sprite(" . $sprite->getID() . ")'
                            >
                        ";
                    }   
                ?>
            </aside>
            <article >
				article
                Vous etes dans la partie montage.
                <canvas id="canvas" ></canvas>
                <!--<video id="videoScreen"></video>
				<button onclick="getVideo()">Start Cam</button>-->
                <div id="current_sprites">


                </div>
            </article>
            <nav>
                nav
            </nav>
        </main>
        <footer>
            footer
        </footer>

		<script src="../scripts/webcam.js" type="text/javascript"></script>
        <script src="../scripts/add_sprite.js" type="text/javascript"></script>
        <script>
        function init_canvas()
        {
            var can = document.getElementById('canvas');
            var ctx= can.getContext("2d");

           ctx.fillRect(10,10,150,20);

        }
        </script>
    </body>

    </html>