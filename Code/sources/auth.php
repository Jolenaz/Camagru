<?php
// $con = mysqli_connect($servername, $username, $password);
// mysqli_select_db($con, $eshop);
// $login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING);
// if ($login)
// {
// 	$sql = "SELECT password FROM members WHERE login =?";
// 	$stmt = mysqli_prepare($con, $sql);
// 	if ($stmt)
// 	{
// 		mysqli_stmt_bind_param($stmt, 's', $login);
// 		mysqli_stmt_bind_result($stmt, $passwd);
// 		mysqli_stmt_execute($stmt);
// 		mysqli_store_result($con);
// 		if (mysqli_stmt_fetch($stmt) == 1)
// 		{
// 			$cl_passwd = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
// 			if ($passwd === hash('whirlpool', $cl_passwd))
// 			{
// 				$_SESSION['login'] = $login;
// 				mysqli_stmt_close($stmt);
// 				$sql = "SELECT panier FROM members WHERE login =?";
// 				$stmt = mysqli_prepare($con, $sql);
// 				if ($stmt)
// 				{
// 					mysqli_stmt_bind_param($stmt, 's', $login);
// 					mysqli_stmt_bind_result($stmt,$panier);
// 					mysqli_stmt_execute($stmt);
// 					mysqli_store_result($con);
// 					if (mysqli_stmt_fetch($stmt) == 1)
// 					{
// 						$tab = unserialize($panier);
// 						mysqli_stmt_close($stmt);
// 						if ($_SESSION['panier'] == null)
// 							$_SESSION['panier'] = $tab;
// 						else if ($tab != NULL)
// 						{
// 							$_SESSION['panier'] = ft_merge($_SESSION['panier'], $tab);
// 						}
// 						header('Location: ../index.php');
// 					}
// 				}
// 			}
// 			else
// 			{
// 				$str = "Erreur : Login/Mot de passe non valide !";
// 				echo "$str\n\n";
// 				mysqli_stmt_close($stmt);
// 				include("connection.php");
// 			}
// 		}
// 		else {
// 			echo ("Erreur compte inconnue");
// 			include("connection.php");
// 			mysqli_stmt_close($stmt);
// 		}
// 	}
// 	else {
// 		mysqli_stmt_close($stmt);
// 	}
// }
?>