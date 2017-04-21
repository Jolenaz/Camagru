<?php
require_once('../class/class.php');
function pull_photos($name){
    try {
        $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return (null);
    }

   if ($name === NULL)
        $sth = $dbh->prepare("SELECT * FROM `Photos`;");
   else
   {

       //________________________________________________________________________________ICI RECUPERER L ID DU USERNAME___________________________________________________
       $sth = $dbh->prepare("SELECT * FROM `Photos` WHERE `userName` = " . $name . ";");
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