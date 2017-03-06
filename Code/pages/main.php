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

    <body>
        <header>
            <?php
        if ($_SESSION['log'] == false)
        {
            echo '
            <form action="connection.php">
                <input type="submit" value="Identifiez-vous !" />
            </form>
            ';
        }
        else
        {
            echo '
            <form action="../scripts/deconnection.php">
                <input type="submit" value="Deconnection !" />
            </form>
            '; 
			echo '
            <form action="my_account.php">
                <input type="submit" value="Mon Compte" />
            </form>
            '; 
        }
        
        ?>
        </header>
        <main>
            <aside>
                aside
            </aside>
            <article>
                article
            </article>
            <nav>
			    nav
			    <?php
				if ($_SESSION['log'] == true)
				{
					echo '
					<form action="../pages/montage.php">
						<input type="submit" value="Go Montage" />
					</form>
					'; 
				}
				else
				{
					echo '
					<button onclick="ConnectionNeeded()">Go Montage</button>
					'; 
				}
        		?>
            </nav>
        </main>
        <footer>
            footer
        </footer>

		<script>
		function ConnectionNeeded() {
			alert("Connection requise pour cett section");
		}
		</script>
    </body>

    </html>