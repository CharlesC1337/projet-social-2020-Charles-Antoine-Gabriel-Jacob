<?php
namespace GGChat\classe\dao;

class ProfilePicDAO
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
                    case 'profilePic':
                    {
                        if(isset($_FILES['profile_pic']))
                        {
                            //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
                            $type = $_FILES['profile_pic']['type'];
                            //Le type du fichier. Par exemple, cela peut être « image/png ».
                            $size = $_FILES['profile_pic']['size']; 
                            //La taille du fichier en octets.
                            $file_tmp = $_FILES['profile_pic']['tmp_name']; 
                            //L'adresse vers le fichier uploadé dans le répertoire temporaire.

                            $upload_folder = 'img_user/';

                            $file_name = $_SESSION['u_id'];

                            if($type != 'image/png' && $type != 'image/jpeg')
                            {
                                header("location: membre.php?profilePic=WrongType$type");
                                exit(); 
                            }
                            else
                            {
                                if($size > 1000000)
                                {
                                    header("location: membre.php?profilePic=SizeTooBig");
                                    exit();  

                                }
                                else
                                {
                                    $movefile = move_uploaded_file($file_tmp,$upload_folder .$file_name."_img.png");
                                }
                            }
                            
                            if ($movefile)
                            {
                              header("location: membre.php?upload=Sucess");
                            }
                        }
                    }
                    break;
                }            
            }  
    }
}
?>