<?php
namespace GGChat\classe\checker;

class Logout
{
    function __construct() // Constructeur
    {
        
    }
    
    function check()
    {
            if (isset($_POST['log_id']))
            {
                $f_id=$_POST['log_id'];
                switch ($f_id)
                {
                    case 'logout':
                    {
                        session_start();
                        session_unset();
                        session_destroy();

                        header("location: index.php?logout");

                        exit();
                    }

                    break; 
                }            
            }    
    }
}
?>