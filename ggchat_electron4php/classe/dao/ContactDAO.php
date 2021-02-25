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
    
    public function getContact($idMembre)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM contact where fk_membre1 = :idMembre OR fk_membre2 = :idMembre";
        $requete = $dbh->prepare($sql);
        $requete->bindParam(':idMembre',$idMembre);
        $requete->execute();
        $requete = $requete-> fetchall();
        return $requete;
    }
    
    public function getMembreContact($idMembre)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 
        $sql = "SELECT * FROM membre where id = :idMembre";
        $requete = $dbh->prepare($sql);
        $requete->bindParam(':idMembre',$idMembre);
        $requete->execute();
        $requete = $requete-> fetchall();
        return $requete;
    }
    
    public function ajouterContact($idMembre1, $idMembre2)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 

        $sql = "SELECT * FROM contact WHERE fk_membre1 = :idMembre1 AND fk_membre2 = :idMembre2 OR fk_membre1 = :idMembre2 AND fk_membre2 = :idMembre1;";
        $requete = $dbh->prepare($sql);
        $requete->bindParam(':idMembre1',$idMembre1);
        $requete->bindParam(':idMembre2',$idMembre2);
        $requete->execute();
        $requete = $requete-> fetchall();

        if ($requete){
            return null;
        }else{
            $sqlAjout = "INSERT INTO contact(fk_membre1, fk_membre2) VALUES (:idMembre1, :idMembre2);";
            $requeteAjout = $dbh->prepare($sqlAjout);
            $requeteAjout->bindParam(':idMembre1',$idMembre1);
            $requeteAjout->bindParam(':idMembre2',$idMembre2);
            $requeteAjout->execute();
            $requeteAjout = $requeteAjout-> fetchall();
            return $requeteAjout;
        }
    }

    public function supprimerContact($idMembre1,$idMembre2)
    {
        $DbhObject = new Dbh();
        $dbh = $DbhObject->getDbh(); 

        $sql = "DELETE FROM contact WHERE fk_membre1 = :idMembre1 AND fk_membre2 = :idMembre2 OR fk_membre1 = :idMembre2 AND fk_membre2 = :idMembre1;";
        $requete = $dbh->prepare($sql);
        $requete->bindParam(':idMembre1',$idMembre1);
        $requete->bindParam(':idMembre2',$idMembre2);
        $requete->execute();
        $requete = $requete-> fetchall();
        return $requete;
    }
    
    public function getMembreUIDCourriel($uidCourrielMembre)
    {
        $DbhObject = new Dbh();
                        
        $dbh = $DbhObject->getDbh();
        $sql = $dbh->prepare("SELECT * FROM membre WHERE membre_uid=:uid OR membre_email=:email");
        $sql->bindParam(':uid', $uidCourrielMembre);
        $sql->bindParam(':email', $uidCourrielMembre);
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }
}
?>