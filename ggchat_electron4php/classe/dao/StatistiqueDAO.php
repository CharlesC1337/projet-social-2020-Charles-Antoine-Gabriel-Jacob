<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class StatistiqueDAO
{
    public function getNombreMsgGroup()
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $MESSAGE_SQL_CONTENU = "SELECT * FROM nombre_msg_group";
        $requeteListeContenu = $dbh->prepare($MESSAGE_SQL_CONTENU);
        $requeteListeContenu->execute();
        $listeContenuGroup = $requeteListeContenu-> fetchall();

        return $listeContenuGroup;
    }
    
    public function getListeContenuLabel($resultat)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $MESSAGE_SQL_CONTENU = "SELECT * FROM groupe WHERE id =".$resultat["groupe_fkey"]." LIMIT 1";
        $requeteListeContenu = $dbh->prepare($MESSAGE_SQL_CONTENU);
        $requeteListeContenu->execute();
        $listeContenuLabel = $requeteListeContenu-> fetch();

        return $listeContenuLabel;
    }
}
?>