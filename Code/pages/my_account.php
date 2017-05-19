<?PHP
	session_start();
	if($_SESSION['log']==false)
		header('Location: main.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon compte</title>
    <?php
        include('../css/css.php');
    ?>
</head>
	<body>
		<h1 style="texte-align:center;">Gestion de votre compte</h1>
		<div class="navigation_box">
        <div>
            <form class="navigation_box_component"action="modify_pass.php" method ="post"><input class="nav_button" type="submit" value="Modifier votre mot de passe"></form>
        </div>
		<div>
            <form class="navigation_box_component"action="modify_email.php" method ="post"><input class="nav_button" type="submit" value="Modifier votre email"></form>
        </div>
		<div>
            <form class="navigation_box_component"action="delete_acount.php" method ="post"><input class="nav_button" type="submit" value="Supprimer votre compte"></form>
        </div>
		<div>
            <form class="navigation_box_component"action="main.php" method ="post"><input class="nav_button" type="submit" value="Retour accueil"></form>
        </div>
		</div>
	</body>
</html>