<?PHP
session_start();
$im1 = (isset($_POST["im1"])) ? $_POST["im1"] : NULL;
$im0 = (isset($_POST["im0"])) ? $_POST["im0"] : NULL;
$name = (isset($_POST["name"])) ? $_POST["name"] : NULL;
if ($im0 == NULL || $im1 == NULL || $name == NULL) {
	echo "Le téléchargement des images a échoué!";
} 
require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$name = filter_input(INPUT_POST, name, FILTER_SANITIZE_STRING);

//Ajout de la photo a la table
$sth = $dbh->prepare("INSERT INTO `Photos` (`name`, `userId`) VALUES (?, ?);");
$sth->bindParam(1, $name, PDO::PARAM_STR);
$sth->bindParam(2, $_SESSION['id'], PDO::PARAM_INT);
$sth->execute();

//Recuperatoin de l'id 
$sth = $dbh->prepare("SELECT MAX(`id`) FROM `Photos`;");
$sth->execute();
$result = $sth->fetch();

$id = $result[0];

$sprite = imagecreatefromstring(base64_decode($im1));
$fond = imagecreatefromstring(base64_decode($im0));

imagealphablending($sprite, true);
imagesavealpha($sprite, true);

imagecopy($fond,$sprite,0,0,0,0,imagesx($sprite),imagesy($sprite));

imagepng($fond,"../galerie/p".$id.".png");

$dbh = null;
$sth = null;

?>