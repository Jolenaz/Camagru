<?php
    session_start();
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
                aside
            </aside>
            <article>
                article
            </article>
            <nav>
			    <?php
                    include('modules/nav.php');
        		?>
            </nav>
        </main>
        <footer>
            Property of jbelless. Powerd by PHP
        </footer>
		<script>
		function ConnectionNeeded() {
			alert("Connection requise pour cette section");
		}
		</script>
    </body>

    </html>