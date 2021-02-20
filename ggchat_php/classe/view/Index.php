<?php
namespace GGChat\classe\view;

use GGChat\classe\Page;

class Index extends Page
{
    public $title;
    
    public function __construct() // Constructeur
    {
        parent::__construct();
        $this->title = 'Accueil';
    }
    
    public function contenuPresentation()
    {
        $this->doc .= '<h1 id="titreSite">Bienvenu sur G.G Chat</h1>';
    }
}
?>