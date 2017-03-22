<?PHP
header("Content-Type: text/plain");
$im1 = (isset($_POST["im1"])) ? $_POST["im1"] : NULL;
$im0 = (isset($_POST["im0"])) ? $_POST["im0"] : NULL;

if ($im0 == NULL || $im1 == NULL) {
	echo "Le téléchargement des images a échoué!";
} 
$im0 = base64_decode($im0);
$im1 = base64_decode($im1);

?>