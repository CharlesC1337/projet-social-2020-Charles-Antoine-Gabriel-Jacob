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
    
    public function tableComputer()
    {
        $contactDAO = new ContactDAO();
        $this->doc .= '<h1 id="titrePageh1">Liste des contacts</h1>';
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
        $tableau = $contactDAO->getMembre();
        foreach ($tableau as $row) 
        {
            $this->doc .= "<tr><td>". $row["membre_first"] .
            "</td><td>" . $row["membre_last"] ."</td><td>". $row["membre_email"] ."</td><td>".
             $row["membre_uid"] ."</td><td><a class=\"buttonPrivate\" href=\"ChatPrive.php?membre=".$row["membre_uid"]."\">Envoyer un message</a></td></tr>";  
        }

        $this->doc .= '</tbody></table>';
    }
}
?>