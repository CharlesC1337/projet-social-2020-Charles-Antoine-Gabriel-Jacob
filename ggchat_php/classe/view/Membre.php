<?php
namespace GGChat\classe\view;

use GGChat\classe\Page;

class Membre extends Page
{
    public $title;

    public function __construct() // Constructeur demandant 2 paramètres
    {
        parent::__construct();

        $this->title= 'Membre';
    }
    
    public function formulaire()
    {
        $profilePic='img_user/'.$_SESSION['u_id'].'_img.png';
        
        $this->doc .= '<h1 id="titrePageh1">Bienvenue sur vôtre profil '.$_SESSION["u_uid"].' !</h1>';

        $this->doc .='<div class="grid-container">';
            if(file_exists ($profilePic))
            {
                $this->doc .= "<div class='grid-item'><img id ='profilePicMembre'
                src='$profilePic' alt='Profile picture'>
                </div>";
            }
            else
            {
                $this->doc .="<div class='grid-item'>
                <img id ='profilePicTopMembre' src='img/compte_img.png' alt='Profile picture'>
                </div>" ;
            }
        
            $this->doc .=' <br />
            <div class="grid-item"><form method="POST" action="membre.php" enctype="multipart/form-data">
        <label for="profile_pic">Modifier vôtre icône de profile (JPG ou PNG)</label><br />
        <input type="file" name="profile_pic" id="profile_pic" />
     
        <button type="submit">Sauvegarder</button>
        <input name="f_id" type="hidden" value="profilePic">
        </form>';
        
        $this->doc .= '<br /><label >Changer de nom d\'utilisateur</label>
        <div class="grid-item"><form class="formGeneric" action="membre.php" method="POST" >
            <input type="text" name="userRenew" placeholder="Nouveau nom">
            <button type="submit" name="submit">Sauvegarder</button>
            <input name="f_id" type="hidden" value="Rename">
            </form></div>';
        
        if($_SESSION['u_admin'] != null)
        {
            $this->doc .= '<br /><label >Ajouter un groupe</label>
            <div class="grid-item"><form class="formGeneric" action="membre.php" method="POST" >
            <input type="text" name="groupName" placeholder="Nom du groupe">
            <button type="submit" name="submit">Sauvegarder</button>
            <input name="f_id" type="hidden" value="addGroup">
            </form></div>';
        }
        
        $xmlLocation = "classe\xml\options.xml";
		
		$xml = Simplexml_load_file($xmlLocation);
		
		$this->doc .= '<br /><label >Changer de thème</label><br />
		<form action="classe\xml\SaveOptions.php" method="post">
        <label style="font-size:18px;">Dark</label>
		<input type="radio" name="Theme" value="style.css"';
		if ($xml == 'style.css')
			{$this->doc .=' checked';}
        
		$this->doc .='
		>
        <label style="font-size:18px;">light</label>
		<input type="radio" name="Theme"';
		if ($xml == 'altStyle.css')
			{$this->doc .="checked";}
        
		$this->doc .='
		value="altStyle.css">
		<button type="submit">Sauvegarder</button></form>';
        
        $this->doc .= '</div></div>';
    }
}
?>