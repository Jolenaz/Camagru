<?PHP
    session_start();
    if($_SESSION['log']==true)
        header('Location: main.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Connectez-vous :</title>
    <?php
        include('../css/css.php');
    ?>

</head>

<body>

    <div class="navigation_box" id="ConnectionBox">
        <form class="navigation_box_component" method="POST" action="../server/auth.php">
            <span>
				Identifiant:<input class="navigation_box_text" type="text" name="login" maxlength="30" required><br>
				Mot de Passe:<input class="navigation_box_text" type="password" name="passwd" required>
			</span>
            <input class="nav_button" type="submit" name="Connection">
        </form>
        <form class="navigation_box_component"action="create_account.php">
            <input class="nav_button"type="submit" value="Créer un compte" />
        </form>
        <form class="navigation_box_component"action="lostMail.php">
            <input class="nav_button"type="submit" value="Mots de passe oublié" />
        </form>
        <div>
            <form class="navigation_box_component"action="main.php" method="post"><input class="nav_button" type="submit" value="Retour Accueil"></form>
        </div>
    </div>
</body>

</html>