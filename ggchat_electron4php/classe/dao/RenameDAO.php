<?php
namespace GGChat\classe\dao;

use GGChat\includes\Dbh;
use PDO;

class RenameDAO
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
                    case 'Rename':
                    {
                        $userRenewPg =pg_escape_string($_REQUEST['userRenew']);

                        $userRenew =htmlspecialchars($userRenewPg);

                        if(empty($userRenew))
                        {
                            header("location: membre.php?userRenew=empty");
                            exit(); 
                        }
                        else
                        {
                            $DbhObject = new Dbh();

                            $dbh = $DbhObject->getDbh(); 
                            $sql = $dbh->prepare("SELECT * FROM membre WHERE membre_uid=:uid");
                            $sql->bindParam(':uid', $userRenew);
                            $sql->execute();
                            $data = $sql->fetchAll();
                            $rows = count($data);

                            if($rows > 0 )
                            {
                                header("location: membre.php?userRenew=UserUtiliser");
                                exit(); 
                            }
                            else
                            {
                                $userRenew =htmlspecialchars($userRenewPg);
                                $sql= $dbh->prepare("UPDATE membre SET membre_uid = :userRenew 
                                WHERE id =".$_SESSION["u_id"] );
                                $sql->bindParam(':userRenew', $userRenew);
                                $sql->execute();
                                $_SESSION['u_uid'] = $userRenew;
                                header("location: membre.php?userRenew=worked");
                                exit();
                            }
                        }
                    }
                    break;
                }      
            }
    } 
}
?>