<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class ChatGroupeDAO
{
    public function getGroupe()
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM groupe";
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $requete = $requete-> fetchall();

        return $requete;
    }
}
?>