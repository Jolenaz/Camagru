<?PHP
header("Content-Type: text/plain");
$im1 = (isset($_POST["im1"])) ? $_POST["im1"] : NULL;
$im0 = (isset($_POST["im0"])) ? $_POST["im0"] : NULL;

if ($im0 == NULL || $im1 == NULL) {
	echo "Le téléchargement des images a échoué!";
} 

$sprite = imagecreatefromstring(base64_decode($im1));
$fond = imagecreatefromstring(base64_decode($im0));

imagealphablending($sprite, true);
imagesavealpha($sprite, true);

imagecopy($fond,$sprite,0,0,0,0,imagesx($sprite),imagesy($sprite));


imagepng($fond,"../galerie/test.png");

?>