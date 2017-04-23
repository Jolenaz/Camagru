<?php
require_once('../class/class.php');

function pull_photos($name){

require_once('../config/database.php');

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur202!: " . $e->getMessage() . "<br/>");
    die();
}

if ($name === NULL)
    $sth = $dbh->prepare("SELECT * FROM `Photos`;");
else
{
    $sth3 = $dbh->prepare("SELECT `id` FROM `Users` WHERE `userName` = ?;");
    $sth3->bindParam(1, $name, PDO::PARAM_STR);
    $sth3->execute();
    $result3 = $sth3->fetch();
    $sth = $dbh->prepare("SELECT * FROM `Photos` WHERE `userId` = ?;");
    $sth->bindParam(1, $result3[0], PDO::PARAM_STR);
    $sth3 = null;
}
$sth->execute();

$photos = array();

while($result = $sth->fetch(PDO::FETCH_ASSOC))
{
    $pro = new photo(array('id' => $result['id'], 'name' => $result['name'], 'userId' => $result['userId'] ));

    //trouver likes
    $like_tab = [];
    $sth2 = $dbh->prepare("SELECT `userId` FROM `Likes` WHERE `photoId` = ".$result['id'].";");
    $sth2->execute();
    while($result2 = $sth2->fetch())
    {
        $like_tab[] = $result2[0]; 
    }
    $pro->setLikes($like_tab);
    $sth2 = null;

    //trouver userName
    $sth2 = $dbh->prepare("SELECT `userName` FROM `Users` WHERE `id` = ".$result['userId'].";");
    $sth2->execute();
    $result2 = $sth2->fetch();
    $pro->setUserName($result2[0]);

    $photos[] = $pro;
    $sth2 = null;
}

$sth = null;
$dbh = null;

return $photos;
}
?>