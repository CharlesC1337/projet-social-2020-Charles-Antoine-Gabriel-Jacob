<?php
namespace GGChat;

require_once('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/Index.php');//pour index

use GGChat\classe\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\view\Index as Index;

session_start();

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//--------------------------index--------------------------------//

$PageIndexPrincipal = new Index(); 

$PageIndexPrincipal->htmlHead($PageIndexPrincipal->title);

$PageIndexPrincipal->htmlTopNav('index.php');

$PageIndexPrincipal->contenuPresentation();

$PageIndexPrincipal->Htmlclose();

$PageIndexPrincipal->affiche($PageIndexPrincipal->doc);
?>