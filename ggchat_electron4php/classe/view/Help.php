<?php
namespace GGChat\classe\view;

use GGChat\classe\Page;

class Help extends Page
{
    public $title;
    
    public function __construct() // Constructeur
    {
        parent::__construct();
        $this->title = 'Aide';
    }
    
    public function contenuPresentation()
    {
        $this->doc .= '<h1 id="titrePageh1">Aide</h1>';
        $this->doc .= '<h2 id="titreAideh2">Comment s\'inscrire</h1>';
        $this->doc .= '<p class="center">S\'inscrire est très simple, pour ce faire il faut aller sur la page "Inscription" et remplir le formulaire avec vos informations.<br />Si vous avez déja un compte il suffit d\'entrer vos informations dans le formulaire en haut à droite de l\'écran et d\'appuyer sur le bouton "Connexion".</p>';
        $this->doc .= '<h2 id="titreAideh2">Comment chatter</h1>';
        $this->doc .= '<p class="center">Pour pouvoir chatter, il suffit de se connecter et de choisir un groupe sur lequel chatter, les groupes étant disponible sur la page "Chat".</p>';
        $this->doc .= '<h2 id="titreAideh2">Pour tout autres questions</h1>';
        $this->doc .= '<p class="center">Vous pouvez nous contacter en envoyant un mail à ggchat@gmail.com.</p>';
    }
}
?>