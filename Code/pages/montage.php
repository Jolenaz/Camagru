<?php
    session_start();
    include_once '../class/class.php';
    include_once '../srcs/pull_sprites.php';
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

    <body >
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
                            draggable='true'
                            ondragstart='drag(event)'
                            onclick='add_sprite()'
                            >
                        ";
                    }   
                ?>
            </aside>
            <article >
				article
                Vous etes dans la partie montage.
                <canvas id="board">
                    <video id="videoScreen"></video>
                </canvas>
				<button onclick="getVideo()">Start Cam</button>
            </article>
            <nav>
                nav
            </nav>
        </main>
        <footer>
            footer
        </footer>

		<script src="../scripts/webcam.js" type="text/javascript"></script>
        <script src="../scripts/dragNdrop.js" type="text/javascript"></script>
    </body>

    </html>