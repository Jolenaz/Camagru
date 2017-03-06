<?php
    session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="../css/main.css">

    </head>

    <body onload="link_cam()">
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
                aside
            </aside>
            <article>
				article
                Vous etes dans la partie montage.
				<video id="videoScreen">		
				</video>
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
    </body>

    </html>