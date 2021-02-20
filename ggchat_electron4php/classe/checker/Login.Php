<?php
namespace GGChat\classe\checker;

use GGChat\includes\Dbh;

class Login 
{
    function __construct() // Constructeur
    {
        
    }
    
    function check()
    {
        if(isset($_POST['log_id']))
        {
            $f_id=$_POST['log_id'];
            switch($f_id)
            {
                case 'login':
                    {
                        $uidpg = pg_escape_string($_POST['uid']);
                        $pwdpg = pg_escape_string($_POST['pwd']);

                        $uid = htmlspecialchars($uidpg);
                        $pwd = htmlspecialchars($pwdpg);

                        //error handler
                        if (empty($uid)||empty($pwd))
                        {
                            header("location: index.php?login=empty");
                            exit();
                        }
                        else
                        {
                            $DbhObject = new Dbh();

                            $dbh = $DbhObject->getDbh();
                            
                            $sql = $dbh->prepare("SELECT * FROM membre WHERE membre_uid=:uid OR membre_email=:email");
                            $sql->bindParam(':email', $uid);
                            $sql->bindParam(':uid', $uid);
                            $sql->execute();
                            $data = $sql->fetch();
                            $rowsCount = count($data);
                            if ($rowsCount === 0)  
                            {
                                header("location: index.php?login=error");
                                exit(); 
                            }
                            else
                            {
                                if ($row == pg_fetch_array($data))
                                {
                                    //de-hasing pwd
                                    $hasedPwdCheck = password_verify($pwd,$data['membre_pwd']);

                                    if ($hasedPwdCheck == false)
                                    {
                                        header("location: index.php?login=error");
                                        exit();
                                    }
                                    elseif($hasedPwdCheck == true)
                                    {
                                        //log in the user here 

                                        $_SESSION['u_id'] = $data['id'];
                                        $_SESSION['u_first'] = $data['membre_first'];
                                        $_SESSION['u_last'] = $data['membre_last'];
                                        $_SESSION['u_email'] = $data['membre_email'];
                                        $_SESSION['u_uid'] = $data['membre_uid'];
                                        $_SESSION['u_admin'] = $data['membre_admin'] ;
                                        
                                        header("location: index.php?login=succes");
                                        exit();
                                    }
                                    else
                                    {
                                        header("location: index.php?login=error");
                                        exit();  
                                    }
                                }
                            }
                        }
                    }
                break;
            }   
        }
    } 
}
?>