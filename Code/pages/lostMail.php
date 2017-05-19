<?PHP
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <?php
        include('../css/css.php');
    ?>
	</head>
	<body>
		<h1 style="texte-align:center;">Recevoir un nouveau mot de passe par email</h1>
	<div class="navigation_box">
			<form class="navigation_box_component" method="POST" action="../server/sendMail.php">
                Courriel: <input class="navigation_box_text"type="email" name="mail" required/>
                <input class="nav_button" type ="submit" value="OK" name="submit" />
			</form>
		<div>
            <form class="navigation_box_component" action="connection.php" method ="post"><input class="nav_button" type="submit" value="Annuler"></form>
        </div>
		</div>
	</body>
</html>