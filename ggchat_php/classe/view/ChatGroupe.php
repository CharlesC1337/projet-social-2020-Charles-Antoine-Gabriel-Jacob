<?php
namespace GGChat\classe;

use GGChat\classe\Page;
use GGChat\classe\dao\ChatGroupeDAO;
use PDO;

class ChatGroupe extends Page
{
  
  public $title;

  public function __construct() 
  {
      parent::__construct();
      $this->title= 'Liste des Chats';
  }
    public function groupChatPrint()
    {
        $this->doc .= '<h1 id="titrePageh1">Liste des Chats</h1>';
        $this->doc.='<div class="grilleGroupeChat">';
        $chatGroupeDAO = new ChatGroupeDAO();
        $tableau = $chatGroupeDAO->getGroupe();
        $reversed = array_reverse($tableau);
        
        foreach ($reversed as $row) 
        {
            $this->doc.='<a class="lienGrilleGroupeChat" href="chatGroupeDetail.php?groupe='.$row["groupe_nom"].'">'.$row["groupe_nom"].'</a>' ;
        }
        $this->doc.='</div>';
    }
}