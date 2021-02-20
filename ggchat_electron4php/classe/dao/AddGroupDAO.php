<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class AddGroupDAO
{
    public function __construct() // Constructeur demandant 2 paramètres
    {

    } 
    
    public function check()
    {
        if(isset($_POST['f_id']))
            {
                $f_id=$_POST['f_id'];
                switch($f_id)
                {
                    case 'addGroup':
                    {

                        $groupNamePg =pg_escape_string($_REQUEST['groupName']);

                        $groupName =htmlspecialchars($groupNamePg);

                        if(empty($groupName))
                        {
                            header("location: membre.php?groupName=empty");
                            exit(); 
                        }
                        else
                        {
                            $DbhObject = new Dbh();

                            $dbh = $DbhObject->getDbh(); 
                            $sql = $dbh->prepare("INSERT INTO public.groupe(groupe_nom)VALUES (:groupe_nom);");
                            $sql->bindParam(':groupe_nom', $groupName);
                            $sql->execute();

                        }
                    }
                    break;
                }             
            }
    }
}
?>