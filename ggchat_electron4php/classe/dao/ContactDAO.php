<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class ContactDAO
{
    public function getMembre()
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM membre";
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $requete = $requete-> fetchall();
        return $requete;
    }
}
?>