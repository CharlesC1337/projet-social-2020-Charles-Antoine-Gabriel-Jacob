<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class ChatPriveDAO
{
    public function getIdWhereMembreUid($membre)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT id FROM membre WHERE membre_uid='".$membre."' LIMIT 1";
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetch();

        return $data;
    }
    
    public function insertMsgPrive($id,$message_prive_contenu,$uid){
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh();
        $sql= $dbh->prepare("INSERT INTO public.message_prive 
        (membre_envoyeur_fkey,membre_receveur_fkey,message_prive_contenu, timestamp) VALUES (".$uid.",:membre_receveur_id,:message_prive_contenu, to_char(current_timestamp, 'yyyy-mm-dd hh:mi:ss'));");
        $sql->bindParam(':membre_receveur_id',$id );
        $sql->bindParam(':message_prive_contenu',$message_prive_contenu );

        $sql->execute();
    }
    
    public function getMsgPrive($id,$uid)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM message_prive Where membre_envoyeur_fkey=".$id." AND membre_receveur_fkey=".$uid." OR membre_receveur_fkey=".$id." AND membre_envoyeur_fkey=".$uid;
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetchAll();

        return $data;
    }
    
    public function getMembreEnvoyeur($membre_envoyeur_fkey)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM membre WHERE id=".$membre_envoyeur_fkey;
        $requete = $dbh->prepare($sql);
        $requete->execute();
        $data = $requete-> fetch();

        return $data;
    }
}
?>