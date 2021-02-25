<?php
namespace GGChat\classe\view;

use GGChat\classe\Page;
use GGChat\classe\dao\ContactDAO;
use PDO;

class Contact extends Page
{
    public $title;

    public function __construct() // Constructeur demandant 2 paramètres
    {
        parent::__construct();

        $this->title= 'Contact';
    }

    public function contactAdd()
    {
        if (isset($_POST['f_id']))
        {
            $contactDAO = new ContactDAO();

            $contactpg = pg_escape_string($_REQUEST['ajouter-contact']);

            $contact = htmlspecialchars($contactpg);

            //error handler 
            //check empty fields 

            if (false)//strpos($uid, '<') !== false||strpos($a, '>') !== false
            {
                header("location: ../contact.php?contact=NoInjection");
                exit();
            }
            else
            {
                if (empty($contact))
                {
                    //echo "<script>alert('empty')/script>";
                    header("location: contact.php?contact=empty");
                    exit(); 
                }
                else
                {
                    $data = $contactDAO->getMembreUIDCourriel($contact);
                    $rows = count($data);

                    if ($rows<=0)
                    {
                        header("location: contact.php?contact=UserNonExistant");
                        exit();
                    }
                    else
                    {
                        if ($rows==1)
                        {
                            if (!empty($data)){
                                $newContact = null;

                                foreach($data as $membre)
                                {
                                   $newContact = $membre;
                                }

                                $reussite = $contactDAO->ajouterContact($_SESSION['u_id'], $newContact['id']);

                                if ($reussite){
                                    header("location: contact.php?contact=Success");
                                    exit(); 
                                }else{
                                    header("location: contact.php?contact=Erreur");
                                    exit(); 
                                }
                            }
                        }else{
                            header("location: contact.php?contact=PlusieursUser");
                            exit(); 
                        }
                    }    
                }
            }
        }  
    }

    public function contactDel()
    {
        if (isset($_POST['f_id2']))
        {
            $contactDAO = new ContactDAO();

            $contactIdpg = pg_escape_string($_REQUEST['idContact']);

            $contactId = htmlspecialchars($contactIdpg);

            //error handler 
            //check empty fields 

            if (false)//strpos($uid, '<') !== false||strpos($a, '>') !== false
            {
                header("location: ../contact.php?contact=NoInjection");
                exit();
            }
            else
            {
                if (empty($contactId))
                {
                    //echo "<script>alert('empty')/script>";
                    header("location: contact.php?contact=empty");
                    exit(); 
                }
                else
                {
                    $reussite = $contactDAO->supprimerContact($_SESSION['u_id'], $contactId);

                    if ($reussite){
                        header("location: contact.php?contact=Success");
                        exit(); 
                    }else{
                        header("location: contact.php?contact=Erreur");
                        exit(); 
                    }
                }
            }
        }  
    }
    
    public function tableComputer()
    {
        $contactDAO = new ContactDAO();

        $this->doc .= '<h1 id="titrePageh1">Liste des contacts</h1>';

        $this->doc .= '<form style="float:right; margin:0rem; margin-bottom:1rem; margin-right: 2rem;" class="formGeneric" action="contact.php" method="POST" >
            <label class="labelInscription" for="ajouter-contact">Ajouter un Contact</label><br />
            <input type="text" name="ajouter-contact" placeholder="Nom d\'utilisateur ou Courriel">
            <button type="submit" name="submit">Ajouter</button>
            <input name= "f_id" type="hidden" value="contact">
            </form>'; 

        $this->doc .= '<table>
        <thead>
        <tr>
        <th>Prenom</th>
        <th>Nom de famille</th>
        <th>Courriel</th>
        <th>Nom utilisateur</th>
        <th></th>
        </tr>
        </thead>
        <tbody>';

        $listeContact = $contactDAO->getContact($_SESSION['u_id']);
        foreach ($listeContact as $contact) {
            $membreId = null;
            if ($contact['fk_membre1'] == $_SESSION['u_id']){
                $membreId = $contact['fk_membre2'];
            }else{
                $membreId = $contact['fk_membre1'];
            }
            $tableau = $contactDAO->getMembreContact($membreId);
            foreach ($tableau as $row) 
            {
                $this->doc .= "<tr><td>". $row["membre_first"] .
                "</td><td>" . $row["membre_last"] ."</td><td>". $row["membre_email"] ."</td><td>".
                $row["membre_uid"] ."</td><td><a class=\"buttonTableauContact\" href=\"ChatPrive.php?membre=".$row["membre_uid"]."\">Envoyer un message</a></td><td>
                <form action='contact.php' method='POST'>
                <input name= 'idContact' type='hidden' value='".$row['id']."'>
                <button class=\"buttonTableauContact\" type='submit' name='submit'>Supprimer Contact</button>
                <input name= 'f_id2' type='hidden' value='contact'>
                </form></td></tr>";
            }
        }

        $this->doc .= '</tbody></table>';
    }
}
?>