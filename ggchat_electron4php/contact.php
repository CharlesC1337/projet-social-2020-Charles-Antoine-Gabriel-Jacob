<?php
namespace GGChat;

session_start();

require_once('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/Contact.php');//pour computer
require_once('classe/dao/ContactDAO.php');//pour computer

use GGChat\classe\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\view\Contact as Contact;

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//--------------------------contact--------------------------------//

$PageContactPrincipal = new Contact(); 

$PageContactPrincipal->contactAdd();

$PageContactPrincipal->contactDel();

$PageContactPrincipal->htmlHead($PageContactPrincipal->title);

$PageContactPrincipal->htmlTopNav('contact.php');

$PageContactPrincipal->tableComputer();  
    
$PageContactPrincipal->Htmlclose();

$PageContactPrincipal->affiche($PageContactPrincipal->doc);
?>