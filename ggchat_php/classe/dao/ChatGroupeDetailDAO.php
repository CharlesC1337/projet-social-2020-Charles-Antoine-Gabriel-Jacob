<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class ChatGroupeDetailDAO
{
    public function getGroupeRow($groupeNom)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT id FROM groupe WHERE groupe_nom='".$groupeNom."' LIMIT 1";
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $group_row = $requete-> fetch();

        return $group_row;
    }
    
    public function getMessageGroup($group_row)
    {
        
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM message_groupe Where groupe_fkey=".$group_row['id'];
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetchAll();

        return $data;
    }
    
    public function getMembreWhereId($row)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM membre WHERE id=".$row['membre_fkey'];
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetch();

        return $data;
    }
    
    public function getGroupeWhereNom($groupe)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT id FROM groupe WHERE groupe_nom='".$groupe."' LIMIT 1";
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetch();

        return $data;
    }
    
    public function insertMessageGroupe($group_id,$message_groupe_contenu){
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh();
        $sql= $dbh->prepare("INSERT INTO public.message_groupe 
        (groupe_fkey,membre_fkey,message_groupe_contenu, timestamp) VALUES (:group_id,".$_SESSION['u_id'].",:message_groupe_contenu, to_char(current_timestamp, 'yyyy-mm-dd hh:mi:ss'));");
        $sql->bindParam(':group_id',$group_id );
        $sql->bindParam(':message_groupe_contenu',$message_groupe_contenu );

        $sql->execute();
    }
}
?>